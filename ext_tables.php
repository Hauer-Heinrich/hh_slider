<?php
defined('TYPO3') || die('Access denied.');

use \TYPO3\CMS\Core\Utility\ExtensionManagementUtility;

call_user_func(function(string $extensionKey) {
    // Typo3 extension manager gearwheel icon (ext_conf_template.txt)
    $extensionConfiguration = isset($GLOBALS['TYPO3_CONF_VARS']['EXTENSIONS'][$extensionKey]) ? $GLOBALS['TYPO3_CONF_VARS']['EXTENSIONS'][$extensionKey] : [];
    $extensionConfig = isset($extensionConfiguration['config']) ? $extensionConfiguration['config'] : [];

    // automatically add TypoScript, can be disabled in the extension configuration (BE)
    if ($extensionConfig['typoScript'] === '1') {
        // Add PageTS
        ExtensionManagementUtility::addPageTSConfig(
            "@import 'EXT:".$extensionKey."/Configuration/TsConfig/AllPage.typoscript'"
        );

        // Add Constants
        ExtensionManagementUtility::addTypoScriptConstants(
            "@import 'EXT:".$extensionKey."/Configuration/TypoScript/constants.typoscript'"
        );

        // Add Setup
        ExtensionManagementUtility::addTypoScriptSetup(
            "@import 'EXT:".$extensionKey."/Configuration/TypoScript/setup.typoscript'"
        );
    }
}, 'hh_slider');
