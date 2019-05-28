<?php

$GLOBALS['TCA']['tt_content']['ctrl']['typeicon_classes']['hhslider_hh_slider'] = 'tx_hhslider_hh_slider';
$tempColumns = array (
    'tx_hhslider_animation' => array (
        'config' => array (
            'items' => array (
                0 => array (
                    0 => 'LLL:EXT:hh_slider/Resources/Private/Language/locallang_db.xlf:tt_content.tx_hhslider_animation.I.0',
                    1 => 'carousel',
                ),
                1 => array (
                    0 => 'LLL:EXT:hh_slider/Resources/Private/Language/locallang_db.xlf:tt_content.tx_hhslider_animation.I.1',
                    1 => 'gallery',
                ),
            ),
            'renderType' => 'selectSingle',
            'type' => 'select',
        ),
        'exclude' => '1',
        'label' => 'LLL:EXT:hh_slider/Resources/Private/Language/locallang_db.xlf:tt_content.tx_hhslider_animation',
    ),
    'tx_hhslider_animation_direction' => array (
        'config' => array (
            'items' => array (
                0 => array (
                    0 => 'LLL:EXT:hh_slider/Resources/Private/Language/locallang_db.xlf:tt_content.tx_hhslider_animation_direction.I.0',
                    1 => 'horizontal',
                ),
                1 => array (
                    0 => 'LLL:EXT:hh_slider/Resources/Private/Language/locallang_db.xlf:tt_content.tx_hhslider_animation_direction.I.1',
                    1 => 'vertical',
                ),
            ),
            'renderType' => 'selectSingle',
            'type' => 'select',
        ),
        'exclude' => '1',
        'label' => 'LLL:EXT:hh_slider/Resources/Private/Language/locallang_db.xlf:tt_content.tx_hhslider_animation_direction',
    ),
    'tx_hhslider_animation_speed' => array (
        'label' => 'LLL:EXT:hh_slider/Resources/Private/Language/locallang_db.xlf:tt_content.tx_hhslider_animation_speed',
        'config' => array (
            'type' => 'input',
            'default' => '3000',
            'eval' => 'int',
            'max' => '5',
            'placeholder' => '3000',
            'range' => array (
                'lower' => '0',
            ),
        ),
        'exclude' => '1',
    ),
    'tx_hhslider_arrows' => array (
        'config' => array (
            'type' => 'check',
            'renderType' => 'checkboxLabeledToggle',
            'items' => array (
                0 => array (
                    0 => 'false',
                    1 => 'true',
                    'labelChecked' => 'Enabled',
                    'labelUnchecked' => 'Disabled',
                ),
            ),
        ),
        'exclude' => '1',
        'label' => 'LLL:EXT:hh_slider/Resources/Private/Language/locallang_db.xlf:tt_content.tx_hhslider_arrows',
    ),
    'tx_hhslider_autoplay' => array (
        'label' => 'LLL:EXT:hh_slider/Resources/Private/Language/locallang_db.xlf:tt_content.tx_hhslider_autoplay',
        'onChange' => 'reload',
        'config' => array (
            'type' => 'check',
            'renderType' => 'checkboxLabeledToggle',
            'items' => array (
                0 => array (
                    0 => '',
                    1 => '',
                    'labelChecked' => 'Enabled',
                    'labelUnchecked' => 'Disabled',
                ),
            ),
            'default' => 1
        ),
        'exclude' => '1',
    ),
    'tx_hhslider_autoplay_speed' => array (
        'label' => 'LLL:EXT:hh_slider/Resources/Private/Language/locallang_db.xlf:tt_content.tx_hhslider_autoplay_speed',
        'displayCond' => 'FIELD:tx_hhslider_autoplay:REQ:true',
        'config' => array (
            'type' => 'input',
            'default' => '3000',
            'eval' => 'int',
            'max' => '5',
            'placeholder' => '3000',
            'range' => array (
                'lower' => '0',
            ),
        ),
        'exclude' => '1',
    ),
    'tx_hhslider_centered_slides' => array (
        'config' => array (
            'type' => 'check',
            'renderType' => 'checkboxLabeledToggle',
            'items' => array (
                0 => array (
                    0 => '',
                    1 => '',
                    'labelChecked' => 'Enabled',
                    'labelUnchecked' => 'Disabled',
                ),
            ),
            'default' => 1
        ),
        'exclude' => '1',
        'label' => 'LLL:EXT:hh_slider/Resources/Private/Language/locallang_db.xlf:tt_content.tx_hhslider_centered_slides',
    ),
    'tx_hhslider_child_content' => array (
        'label' => 'LLL:EXT:hh_slider/Resources/Private/Language/locallang_db.xlf:tt_content.tx_hhslider_child_content',
        'displayCond' => 'FIELD:tx_hhslider_content_type:=:2',
        'config' => array (
            'appearance' => array (
                'collapseAll' => '1',
                'enabledControls' => array (
                    'dragdrop' => '1',
                ),
                'expandSingle' => '1',
                'levelLinksPosition' => 'both',
                'showAllLocalizationLink' => '1',
                'showPossibleLocalizationRecords' => '1',
                'showSynchronizationLink' => '1',
                'useSortable' => '1',
            ),
            'foreign_sortby' => 'sorting',
            'foreign_table' => 'tt_content',
            'overrideChildTca' => array (
                'columns' => array (
                    'colPos' => array (
                        'config' => array (
                            'default' => '999',
                        ),
                    ),
                ),
            ),
            'type' => 'inline',
            'foreign_field' => 'tx_hhslider_child_content_parent',
        ),
        'exclude' => '1',
    ),
    'tx_hhslider_content_type' => array (
        'label' => 'LLL:EXT:hh_slider/Resources/Private/Language/locallang_db.xlf:tt_content.tx_hhslider_content_type',
        'onChange' => 'reload',
        'config' => array (
            'items' => array (
                0 => array (
                    0 => 'LLL:EXT:hh_slider/Resources/Private/Language/locallang_db.xlf:tt_content.tx_hhslider_content_type.I.0',
                    1 => '1',
                ),
                1 => array (
                    0 => 'LLL:EXT:hh_slider/Resources/Private/Language/locallang_db.xlf:tt_content.tx_hhslider_content_type.I.1',
                    1 => '2',
                ),
            ),
            'default' => 1,
            'renderType' => 'selectSingle',
            'type' => 'select',
        ),
        'exclude' => '1',
    ),
    'tx_hhslider_content_text' => [
        'label' => 'Text',
        'displayCond' => 'FIELD:tx_hhslider_content_type:=:1',
        'config' => [
            'type' => 'text',
            'enableRichtext' => true,
        ],
    ],
    'tx_hhslider_disable_on_interaction' => array (
        'config' => array (
            'type' => 'check',
            'renderType' => 'checkboxLabeledToggle',
            'items' => array (
                0 => array (
                    0 => '',
                    1 => '',
                    'labelChecked' => 'Enabled',
                    'labelUnchecked' => 'Disabled',
                ),
            ),
        ),
        'exclude' => '1',
        'label' => 'LLL:EXT:hh_slider/Resources/Private/Language/locallang_db.xlf:tt_content.tx_hhslider_disable_on_interaction',
    ),
    'tx_hhslider_loop' => array (
        'config' => array (
            'type' => 'check',
            'renderType' => 'checkboxLabeledToggle',
            'items' => array (
                0 => array (
                    0 => '',
                    1 => '',
                    'labelChecked' => 'Enabled',
                    'labelUnchecked' => 'Disabled',
                ),
            ),
            'default' => 1
        ),
        'exclude' => '1',
        'label' => 'LLL:EXT:hh_slider/Resources/Private/Language/locallang_db.xlf:tt_content.tx_hhslider_loop',
    ),
    'tx_hhslider_pagination' => array (
        // 'onChange' => 'reload',
        'config' => array (
            'type' => 'check',
            'renderType' => 'checkboxLabeledToggle',
            'items' => array (
                0 => array (
                    0 => '',
                    1 => '',
                    'labelChecked' => 'Enabled',
                    'labelUnchecked' => 'Disabled',
                ),
            ),
            'default' => 0
        ),
        'exclude' => '1',
        'label' => 'LLL:EXT:hh_slider/Resources/Private/Language/locallang_db.xlf:tt_content.tx_hhslider_pagination',
    ),
    'tx_hhslider_slides_per_view' => array (
        'config' => array (
            'default' => '1',
            'eval' => 'int,required',
            'max' => '3',
            'placeholder' => '1',
            'type' => 'input',
        ),
        'exclude' => '1',
        'label' => 'LLL:EXT:hh_slider/Resources/Private/Language/locallang_db.xlf:tt_content.tx_hhslider_slides_per_view',
    ),
    'tx_hhslider_thumbnails' => array (
        // 'displayCond' => 'FIELD:tx_hhslider_pagination:=:0',
        'config' => array (
            'type' => 'check',
            'renderType' => 'checkboxLabeledToggle',
            'items' => array (
                0 => array (
                    0 => '',
                    1 => '',
                    'labelChecked' => 'Enabled',
                    'labelUnchecked' => 'Disabled',
                ),
            ),
            'default' => 0
        ),
        'exclude' => '1',
        'label' => 'LLL:EXT:hh_slider/Resources/Private/Language/locallang_db.xlf:tt_content.tx_hhslider_thumbnails',
    ),
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns('tt_content', $tempColumns);
$GLOBALS['TCA']['tt_content']['columns']['CType']['config']['items'][] = [
    'LLL:EXT:hh_slider/Resources/Private/Language/locallang_db.xlf:tt_content.CType.div._hhslider_',
    '--div--',
];

$GLOBALS['TCA']['tt_content']['columns']['CType']['config']['items'][] = [
    'LLL:EXT:hh_slider/Resources/Private/Language/locallang_db.xlf:tt_content.CType.hhslider_hh_slider',
    'hhslider_hh_slider',
    'tx_hhslider_hh_slider',
];

$tempPalettes = array (
    'slider_header_config' => [
        'showitem' => 'header_layout, header_position', 'canNotCollapse' => 1
    ],
    'slider_autoplay_config' => [
        'showitem' => 'tx_hhslider_autoplay, tx_hhslider_autoplay_speed', 'canNotCollapse' => 1
    ],
    'slider_animation_config' => [
        'showitem' => 'tx_hhslider_animation, tx_hhslider_animation_direction, tx_hhslider_animation_speed', 'canNotCollapse' => 1
    ],
    'slider_navigation' => [
        'showitem' => 'tx_hhslider_arrows, tx_hhslider_pagination, tx_hhslider_thumbnails', 'canNotCollapse' => 1
    ],
);

$GLOBALS['TCA']['tt_content']['palettes'] += $tempPalettes;

$tempTypes = array (
    'hhslider_hh_slider' => array (
        'columnsOverrides' => array (
            'bodytext' => array (
                'config' => array (
                    'richtextConfiguration' => 'default',
                    'enableRichtext' => 1,
                ),
            ),
            'assets' => array (
                'displayCond' => 'FIELD:tx_hhslider_content_type:=:1',
                'label' => 'Images',
                'config' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::getFileFieldTCAConfig('assets', [],
                    'jpg, jpeg, png, svg'
                ),
            ),
        ),

        'showitem' => '
            --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:general,
            --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:palette.general;general,
                header,
                subheader,
                --palette--;;slider_header_config,
                tx_hhslider_content_type,
                assets,
                tx_hhslider_child_content,
                tx_hhslider_content_text,
            --div--;Options,
                --palette--;;slider_autoplay_config,
                --palette--;;slider_animation_config,
                tx_hhslider_loop,
                tx_hhslider_slides_per_view,
                tx_hhslider_disable_on_interaction,
                tx_hhslider_centered_slides,
                --palette--;;slider_navigation,
            --div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:tabs.appearance,
                --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:palette.frames;frames,
                --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:palette.appearanceLinks;appearanceLinks,
            --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:language,--palette--;;language,
            --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:access,--palette--;;hidden,
                --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:palette.access;access,
            --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:categories,
            --div--;LLL:EXT:core/Resources/Private/Language/locallang_tca.xlf:sys_category.tabs.category,
                categories,
            --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:notes,
                rowDescription,
            --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:extended
        ',
    ),
);

$GLOBALS['TCA']['tt_content']['types'] += $tempTypes;

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile(
    'hh_slider',
    'Configuration/TypoScript/',
    'hh_slider'
);
