<?php
defined('TYPO3') || die('Access denied.');

use \TYPO3\CMS\Core\Utility\ExtensionManagementUtility;

call_user_func(function(string $extensionKey) {
    // Typo3 extension manager gearwheel icon (ext_conf_template.txt)
    $extensionConfiguration = isset($GLOBALS['TYPO3_CONF_VARS']['EXTENSIONS'][$extensionKey]) ? $GLOBALS['TYPO3_CONF_VARS']['EXTENSIONS'][$extensionKey] : [];
    $extensionConfig = isset($extensionConfiguration['config']) ? $extensionConfiguration['config'] : [];

    // If automatically include of TypoScript is disabled, then you can include it in the (BE) static-template select-box
    if ($extensionConfig['typoScript'] === '0') {
        ExtensionManagementUtility::registerPageTSConfigFile(
            $extensionKey,
            'Configuration/TsConfig/AllPage.typoscript',
            'Hauer-Heinrich - Slider Page TS'
        );
    }
}, 'hh_slider');
