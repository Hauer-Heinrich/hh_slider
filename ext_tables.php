<?php
defined('TYPO3') || die('Access denied.');

call_user_func(function() {
    $extensionKey = 'hh_slider';

    // get ext_conf_template.txt config
    $extConfig = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Core\Configuration\ExtensionConfiguration::class)
        ->get($extensionKey, 'config');

    // automatically add TypoScript, can be disabled in the extension configuration (BE)
    if ($extConfig['typoScript'] === '1') {
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
