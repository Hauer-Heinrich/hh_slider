<?php
defined('TYPO3') || die('Access denied.');

use \HauerHeinrich\HhSlider\Controller\SliderController;

call_user_func(function(string $extensionKey) {

    \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
        $extensionKey,
        'Slider',
        [
            SliderController::class => 'slider',
        ],
        // non-cacheable actions
        [
        ],
        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::PLUGIN_TYPE_CONTENT_ELEMENT
    );

    $GLOBALS['TYPO3_CONF_VARS']['SYS']['formEngine']['formDataGroup']['tcaDatabaseRecord'][\HauerHeinrich\HhSlider\Form\FormDataProvider\TcaColPosItem::class] = [
        'depends' => [
            \TYPO3\CMS\Backend\Form\FormDataProvider\DatabaseRowDefaultValues::class,
        ],
        'before' => [
            \TYPO3\CMS\Backend\Form\FormDataProvider\TcaSelectItems::class,
        ],
    ];

    // Register UpdateWizards
    $GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['ext/install']['update']['hhSlider_ctypeUpgradeWizard']
        = \HauerHeinrich\HhSlider\Upgrades\CtypeUpgradeWizard::class;
    $GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['ext/install']['update']['hhSlider_colPosUpgradeWizard']
        = \HauerHeinrich\HhSlider\Upgrades\ColPosUpgradeWizard::class;
    $GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['ext/install']['update']['hhSlider_changeResponsivePartFieldTypeUpgradeWizard']
        = \HauerHeinrich\HhSlider\Upgrades\ChangeResponsivePartFieldTypeUpgradeWizard::class;
}, 'hh_slider');
