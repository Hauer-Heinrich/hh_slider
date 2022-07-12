<?php
namespace HauerHeinrich\HhSlider\ViewHelpers;

/***************************************************************
 * Copyright notice
 *
 * (c) 2018 Christian Hackl <hackl.chris@googlemail.com>
 * All rights reserved
 *
 * This script is part of the TYPO3 project. The TYPO3 project is
 * free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 *
 * The GNU General Public License can be found at
 * http://www.gnu.org/copyleft/gpl.html.
 *
 * This script is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * This copyright notice MUST APPEAR in all copies of the script!
 * Example
 * <html xmlns:f="http://typo3.org/ns/TYPO3/CMS/Fluid/ViewHelpers"
 *   xmlns:hh="http://typo3.org/ns/VENDOR/NAMESPACE/ViewHelpers"
 *   data-namespace-typo3-fluid="true">
 *
 *  <hh:addAssetsData type="js">
 *  or
 *  <hh:addAssetsData type="js" where="header">
 */

// use TYPO3\CMS\Extbase\Utility\DebuggerUtility;
use TYPO3Fluid\Fluid\Core\Rendering\RenderingContextInterface;
use TYPO3Fluid\Fluid\Core\ViewHelper\AbstractViewHelper;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Utility\DebuggerUtility;
use TYPO3\CMS\Frontend\DataProcessing\DatabaseQueryProcessor;
use TYPO3\CMS\Core\Database\RelationHandler;

class GetReferencedAssetsViewHelper extends AbstractViewHelper {
    public function initializeArguments() {
        $this->registerArgument('data', 'array', 'Uid of the record which has the referenced records', true);
        $this->registerArgument('field', 'string', 'Uid of the record which has the referenced records', false, 'assets');
    }

    /**
     * Simple Fluid Viewhelper to add data to the html header tag
     *
     * @param array $arguments
     * @param \Closure $renderChildrenClosure
     * @param RenderingContextInterface $renderingContext
     *
     * @return array
     */
    public static function renderStatic(array $arguments, \Closure $renderChildrenClosure, RenderingContextInterface $renderingContext) {
        // $databaseQueryProcessor = GeneralUtility::makeInstance(DatabaseQueryProcessor::class);
        // DebuggerUtility::var_dump($renderingContext);
        // DebuggerUtility::var_dump($databaseQueryProcessor->process($arguments['data'], [], [  ], []));

        $data = \TYPO3\CMS\Backend\Utility\BackendUtility::resolveFileReferences('tt_content', 'assets', $arguments['data']);

        return $data;

        // $tableName = 'tt_content';
        // $fieldName = 'tx_hhslider_child_content_parent';
        // $workspaceId = null;

        // $configuration = $GLOBALS['TCA'][$tableName]['columns'][$fieldName]['config'];
        // DebuggerUtility::var_dump($configuration);
        // if (empty($configuration['type']) || $configuration['type'] !== 'inline'
        //      || empty($configuration['foreign_table'])
        // ) {
        //     return null;
        // }

        // $fileReferences = [];
        // $relationHandler = GeneralUtility::makeInstance(RelationHandler::class);
        // if ($workspaceId !== null) {
        //     $relationHandler->setWorkspaceId($workspaceId);
        // }
        // $relationHandler->start(
        //     $element[$fieldName],
        //     $configuration['foreign_table'],
        //     $configuration['MM'] ?? '',
        //     $element['uid'],
        //     $tableName,
        //     $configuration
        // );
        // $relationHandler->processDeletePlaceholder();
        // DebuggerUtility::var_dump($relationHandler->tableArray);
        // $referenceUids = $relationHandler->tableArray[$configuration['foreign_table']];

        // DebuggerUtility::var_dump($referenceUids);

        // foreach ($referenceUids as $referenceUid) {
        //     DebuggerUtility::var_dump($referenceUid, 'blub');
        // }
    }
}
