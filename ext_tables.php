<?php
defined('TYPO3') || die('Access denied.');

call_user_func(function() {
    $extensionKey = 'hh_slider';

    // Typo3 extension manager gearwheel icon (ext_conf_template.txt)
    $extensionConfiguration = $GLOBALS['TYPO3_CONF_VARS']['EXTENSIONS'][$extensionKey];
    $extensionConfig = $extensionConfiguration['config'];

    // automatically add TypoScript, can be disabled in the extension configuration (BE)
    if ($extensionConfig['typoScript'] === '1') {
        // Add PageTS
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig(
            '<INCLUDE_TYPOSCRIPT: source="FILE:EXT:'.$extensionKey.'/Configuration/TsConfig/AllPage.typoscript">'
        );

        // Add Constants
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTypoScriptConstants(
            '<INCLUDE_TYPOSCRIPT: source="FILE:EXT:'.$extensionKey.'/Configuration/TypoScript/constants.typoscript">'
        );

        // Add Setup
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTypoScriptSetup(
            '<INCLUDE_TYPOSCRIPT: source="FILE:EXT:'.$extensionKey.'/Configuration/TypoScript/setup.typoscript">'
        );
    }
});
