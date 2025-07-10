<?php

declare(strict_types=1);

namespace HauerHeinrich\HhSlider\Tca;

/*
 * This file is part of TYPO3 CMS-based extension "container" by b13.
 *
 * It is free software; you can redistribute it and/or modify it under
 * the terms of the GNU General Public License, either version 2
 * of the License, or any later version.
 */

// use \TYPO3\CMS\Extbase\Utility\DebuggerUtility;
use \TYPO3\CMS\Backend\View\BackendLayoutView;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Utility\DebuggerUtility;

class ItemProcFunc {
    /**
     * @var BackendLayoutView
     */
    protected $backendLayoutView;

    public function __construct(BackendLayoutView $backendLayoutView) {
        $this->backendLayoutView = $backendLayoutView;
    }

    /**
     * Gets colPos items to be shown in the forms engine.
     * This method is called as "itemsProcFunc" with the hh_slider context
     * for tt_content.colPos.
     */
    public function colPos(array &$parameters): void {
        $row = $parameters['row'];

        if(isset($row['tx_hhslider_child_content_parent']) && $row['tx_hhslider_child_content_parent'] > 0) {
            try {
                $items = [];
                $items[] = [
                    'hh_slider_content_elements',
                    988,
                ];
                $parameters['items'] = $items;

                return;
            } catch (Exception $e) {
            }
        }

        $this->backendLayoutView->colPosListItemProcFunc($parameters);
    }

    /**
     * filterCtypes
     * allow only CTypes which are set via TypoScript settings 'allowedCtypes'
     *
     * @param  array $parameters
     * @return void
     */
    public function filterCtypes(array &$parameters): void {
        if(!empty($parameters) && isset($parameters['items'])) {
            $configurationManager = GeneralUtility::makeInstance('TYPO3\CMS\Extbase\Configuration\ConfigurationManagerInterface');
            $typoScript = $configurationManager->getConfiguration(
                \TYPO3\CMS\Extbase\Configuration\ConfigurationManagerInterface::CONFIGURATION_TYPE_FULL_TYPOSCRIPT,
                'hh_slider'
            );

            if(
                !empty($typoScript)
                && is_array($typoScript)
                && isset($typoScript['plugin.']['tx_hhslider.']['settings.'])
            ) {
                $settings = $typoScript['plugin.']['tx_hhslider.']['settings.'];

                if(isset($settings['allowedCtypes'])) {
                    if($settings['allowedCtypes'] === 'all') {
                        return;
                    }

                    if(is_string($settings['allowedCtypes'])) {
                        $allowedCtypesArray = explode(',', preg_replace('/\s+/', '', $settings['allowedCtypes']));

                        foreach ($parameters['items'] as $key => $value) {
                            $cType = $value[1];
                            if(empty($cType) || in_array($cType, $allowedCtypesArray)) {
                                continue;
                            }
                            unset($parameters['items'][$key]);
                        }
                    }
                }
            }
        }
    }
}
