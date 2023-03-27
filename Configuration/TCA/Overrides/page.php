<?php
defined('TYPO3') || die('Access denied.');

call_user_func(function() {
    $extensionKey = 'hh_slider';

    // get ext_conf_template.txt config
    $extConfig = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Core\Configuration\ExtensionConfiguration::class)
        ->get($extensionKey, 'config');

    // If automatically include of TypoScript is disabled, then you can include it in the (BE) static-template select-box
    if ($extConfig['typoScript'] === '0') {
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::registerPageTSConfigFile(
            $extensionKey,
            'Configuration/TsConfig/AllPage.typoscript',
            'Hauer-Heinrich - Slider Page TS'
        );
    }
});
