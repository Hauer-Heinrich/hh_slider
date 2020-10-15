<?php
defined('TYPO3_MODE') || die('Access denied.');

call_user_func(function() {
    // Register content element icons
    $iconRegistry = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Core\Imaging\IconRegistry::class);
    $iconRegistry->registerIcon(
        'tx_hhslider_hh_slider',
        \TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,
        [
            'source' => 'EXT:hh_slider/Resources/Public/Icons/Content/hh_slider.png',
        ]
    );

    $GLOBALS['TYPO3_CONF_VARS']['SYS']['formEngine']['formDataGroup']['tcaDatabaseRecord'][\HauerHeinrich\HhSlider\Form\FormDataProvider\TcaColPosItem::class] = [
        'depends' => [
            \TYPO3\CMS\Backend\Form\FormDataProvider\DatabaseRowDefaultValues::class,
        ],
        'before' => [
            \TYPO3\CMS\Backend\Form\FormDataProvider\TcaSelectItems::class,
        ],
    ];

    // Add backend preview hook
    $GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['cms/layout/class.tx_cms_layout.php']['tt_content_drawItem']['hh_slider'] =
        HauerHeinrich\HhSlider\Hooks\PageLayoutViewDrawItem::class;

    // Add hook to determine if content record is used/unused
    $GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['cms/layout/class.tx_cms_layout.php']['record_is_used']['hh_slider'] =
        HauerHeinrich\HhSlider\Hooks\PageLayoutViewHook::class . '->contentIsUsed';

    // Register the class to be available in 'eval' of TCA
    $GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['tce']['formevals']['HauerHeinrich\\HhSlider\\Evaluation\\JsonEvaluation'] = '';

    // Check if ext:hh_video_extender is loaded
    if (\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::isLoaded('hh_video_extender')) {
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTypoScriptSetup(
            'tt_content.hhslider_hh_slider.settings.hh_video_extender.isLoaded = 1'
        );
    }
});
