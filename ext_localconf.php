<?php
defined('TYPO3') || die('Access denied.');

call_user_func(function(string $extensionKey) {
    $GLOBALS['TYPO3_CONF_VARS']['SYS']['formEngine']['formDataGroup']['tcaDatabaseRecord'][\HauerHeinrich\HhSlider\Form\FormDataProvider\TcaColPosItem::class] = [
        'depends' => [
            \TYPO3\CMS\Backend\Form\FormDataProvider\DatabaseRowDefaultValues::class,
        ],
        'before' => [
            \TYPO3\CMS\Backend\Form\FormDataProvider\TcaSelectItems::class,
        ],
    ];

    // Register the class to be available in 'eval' of TCA
    $GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['tce']['formevals']['HauerHeinrich\\HhSlider\\Evaluation\\JsonEvaluation'] = '';
    // Register UpdateWizards
    $GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['ext/install']['update']['hhSlider_colPosUpgradeWizard']
        = \HauerHeinrich\HhSlider\Upgrades\ColPosUpgradeWizard::class;
    $GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['ext/install']['update']['hhSlider_changeResponsivePartFieldTypeUpgradeWizard']
        = \HauerHeinrich\HhSlider\Upgrades\ChangeResponsivePartFieldTypeUpgradeWizard::class;
}, 'hh_slider');
