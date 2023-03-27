<?php
defined('TYPO3') || die('Access denied.');

$GLOBALS['TCA']['tt_content']['ctrl']['typeicon_classes']['hhslider_hh_slider'] = 'tx_hhslider_hh_slider';
$tempColumns = [
    'tx_hhslider_animation' => [
        'config' => [
            'items' => [
                0 => [
                    0 => 'LLL:EXT:hh_slider/Resources/Private/Language/locallang_db.xlf:tt_content.tx_hhslider_animation.I.0',
                    1 => 'carousel',
                ],
                1 => [
                    0 => 'LLL:EXT:hh_slider/Resources/Private/Language/locallang_db.xlf:tt_content.tx_hhslider_animation.I.1',
                    1 => 'gallery',
                ],
            ],
            'renderType' => 'selectSingle',
            'type' => 'select',
        ],
        'exclude' => '1',
        'label' => 'LLL:EXT:hh_slider/Resources/Private/Language/locallang_db.xlf:tt_content.tx_hhslider_animation',
    ],
    'tx_hhslider_animation_direction' => [
        'config' => [
            'items' => [
                0 => [
                    0 => 'LLL:EXT:hh_slider/Resources/Private/Language/locallang_db.xlf:tt_content.tx_hhslider_animation_direction.I.0',
                    1 => 'horizontal',
                ],
                1 => [
                    0 => 'LLL:EXT:hh_slider/Resources/Private/Language/locallang_db.xlf:tt_content.tx_hhslider_animation_direction.I.1',
                    1 => 'vertical',
                ],
            ],
            'renderType' => 'selectSingle',
            'type' => 'select',
        ],
        'exclude' => '1',
        'label' => 'LLL:EXT:hh_slider/Resources/Private/Language/locallang_db.xlf:tt_content.tx_hhslider_animation_direction',
    ],
    'tx_hhslider_animation_speed' => [
        'label' => 'LLL:EXT:hh_slider/Resources/Private/Language/locallang_db.xlf:tt_content.tx_hhslider_animation_speed',
        'config' => [
            'type' => 'input',
            'default' => '3000',
            'eval' => 'int',
            'max' => '5',
            'placeholder' => '3000',
            'range' => [
                'lower' => '0',
            ],
        ],
        'exclude' => '1',
    ],
    'tx_hhslider_arrows' => [
        'config' => [
            'type' => 'check',
            'renderType' => 'checkboxLabeledToggle',
            'items' => [
                0 => [
                    0 => 'false',
                    1 => 'true',
                    'labelChecked' => 'Enabled',
                    'labelUnchecked' => 'Disabled',
                ],
            ],
        ],
        'exclude' => '1',
        'label' => 'LLL:EXT:hh_slider/Resources/Private/Language/locallang_db.xlf:tt_content.tx_hhslider_arrows',
    ],
    'tx_hhslider_autoplay' => [
        'label' => 'LLL:EXT:hh_slider/Resources/Private/Language/locallang_db.xlf:tt_content.tx_hhslider_autoplay',
        'onChange' => 'reload',
        'config' => [
            'type' => 'check',
            'renderType' => 'checkboxLabeledToggle',
            'items' => [
                0 => [
                    0 => '',
                    1 => '',
                    'labelChecked' => 'Enabled',
                    'labelUnchecked' => 'Disabled',
                ],
            ],
            'default' => 1
        ],
        'exclude' => '1',
    ],
    'tx_hhslider_autoplay_speed' => [
        'label' => 'LLL:EXT:hh_slider/Resources/Private/Language/locallang_db.xlf:tt_content.tx_hhslider_autoplay_speed',
        'displayCond' => 'FIELD:tx_hhslider_autoplay:REQ:true',
        'config' => [
            'type' => 'input',
            'default' => '3000',
            'eval' => 'int',
            'max' => '5',
            'placeholder' => '3000',
            'range' => [
                'lower' => '0',
            ],
        ],
        'exclude' => '1',
    ],
    'tx_hhslider_centered_slides' => [
        'config' => [
            'type' => 'check',
            'renderType' => 'checkboxLabeledToggle',
            'items' => [
                0 => [
                    0 => '',
                    1 => '',
                    'labelChecked' => 'Enabled',
                    'labelUnchecked' => 'Disabled',
                ],
            ],
            'default' => 1
        ],
        'exclude' => '1',
        'label' => 'LLL:EXT:hh_slider/Resources/Private/Language/locallang_db.xlf:tt_content.tx_hhslider_centered_slides',
    ],
    'tx_hhslider_child_content' => [
        'label' => 'LLL:EXT:hh_slider/Resources/Private/Language/locallang_db.xlf:tt_content.tx_hhslider_child_content',
        'displayCond' => 'FIELD:tx_hhslider_content_type:=:2',
        'config' => [
            'appearance' => [
                'collapseAll' => '1',
                'enabledControls' => [
                    'dragdrop' => '1',
                ],
                'expandSingle' => '1',
                'levelLinksPosition' => 'both',
                'showAllLocalizationLink' => '1',
                'showPossibleLocalizationRecords' => '1',
                'showSynchronizationLink' => '1',
                'useSortable' => '1',
            ],
            'foreign_sortby' => 'sorting',
            'foreign_table' => 'tt_content',
            'overrideChildTca' => [
                'columns' => [
                    'colPos' => [
                        'config' => [
                            'default' => '999',
                        ],
                    ],
                    'CType' => [
                        'config' => [
                            'default' => 'textmedia',
                        ],
                    ],
                ],
            ],
            'type' => 'inline',
            'foreign_field' => 'tx_hhslider_child_content_parent',
        ],
        'exclude' => '1',
    ],
    'tx_hhslider_content_type' => [
        'label' => 'LLL:EXT:hh_slider/Resources/Private/Language/locallang_db.xlf:tt_content.tx_hhslider_content_type',
        'onChange' => 'reload',
        'config' => [
            'items' => [
                0 => [
                    0 => 'LLL:EXT:hh_slider/Resources/Private/Language/locallang_db.xlf:tt_content.tx_hhslider_content_type.I.0',
                    1 => '1',
                ],
                1 => [
                    0 => 'LLL:EXT:hh_slider/Resources/Private/Language/locallang_db.xlf:tt_content.tx_hhslider_content_type.I.1',
                    1 => '2',
                ],
                2 => [
                    0 => 'LLL:EXT:hh_slider/Resources/Private/Language/locallang_db.xlf:tt_content.tx_hhslider_content_type.I.2',
                    1 => '3',
                ],
            ],
            'default' => 1,
            'renderType' => 'selectSingle',
            'type' => 'select',
        ],
        'exclude' => '1',
    ],
    'tx_hhslider_content_text' => [
        'exclude' => 1,
        'label' => 'Text',
        'displayCond' => 'FIELD:tx_hhslider_content_type:=:1',
        'config' => [
            'type' => 'text',
            'enableRichtext' => true,
        ],
    ],
    'tx_hhslider_folder' => [
        'exclude' => 1,
        'label' => 'LLL:EXT:hh_slider/Resources/Private/Language/locallang_db.xlf:tt_content.tx_hhslider_folder',
        'displayCond' => 'FIELD:tx_hhslider_content_type:=:3',
        'config' => [
            'type' => 'group',
            'internal_type' => 'folder',
            'size' => 1,
            'maxitems' => 1,
            'minitems' => 1,
            'show_thumbs' => 0,
            'eval' => 'trim'
        ],
    ],
    'tx_hhslider_disable_on_interaction' => [
        'displayCond' => 'FIELD:tx_hhslider_autoplay:REQ:true',
        'config' => [
            'type' => 'check',
            'renderType' => 'checkboxLabeledToggle',
            'items' => [
                0 => [
                    0 => '',
                    1 => '',
                    'labelChecked' => 'Enabled',
                    'labelUnchecked' => 'Disabled',
                ],
            ],
        ],
        'exclude' => '1',
        'label' => 'LLL:EXT:hh_slider/Resources/Private/Language/locallang_db.xlf:tt_content.tx_hhslider_disable_on_interaction',
    ],
    'tx_hhslider_loop' => [
        'config' => [
            'type' => 'check',
            'renderType' => 'checkboxLabeledToggle',
            'items' => [
                0 => [
                    0 => '',
                    1 => '',
                    'labelChecked' => 'Enabled',
                    'labelUnchecked' => 'Disabled',
                ],
            ],
            'default' => 1
        ],
        'exclude' => '1',
        'label' => 'LLL:EXT:hh_slider/Resources/Private/Language/locallang_db.xlf:tt_content.tx_hhslider_loop',
    ],
    'tx_hhslider_pagination' => [
        // 'onChange' => 'reload',
        'config' => [
            'type' => 'check',
            'renderType' => 'checkboxLabeledToggle',
            'items' => [
                0 => [
                    0 => '',
                    1 => '',
                    'labelChecked' => 'Enabled',
                    'labelUnchecked' => 'Disabled',
                ],
            ],
            'default' => 0
        ],
        'exclude' => '1',
        'label' => 'LLL:EXT:hh_slider/Resources/Private/Language/locallang_db.xlf:tt_content.tx_hhslider_pagination',
    ],
    'tx_hhslider_slides_per_view' => [
        'config' => [
            'default' => '1',
            'eval' => 'int,required',
            'max' => '3',
            'placeholder' => '1',
            'type' => 'input',
        ],
        'exclude' => '1',
        'label' => 'LLL:EXT:hh_slider/Resources/Private/Language/locallang_db.xlf:tt_content.tx_hhslider_slides_per_view',
    ],
    'tx_hhslider_slideby' => [
        'label' => 'LLL:EXT:hh_slider/Resources/Private/Language/locallang_db.xlf:tt_content.tx_hhslider_slideby',
        'config' => [
            'type' => 'input',
            'default' => '1',
            'eval' => 'int',
            'max' => '5',
            'placeholder' => '1',
            'range' => [
                'lower' => '1',
            ],
        ],
        'exclude' => '1',
    ],
    'tx_hhslider_thumbnails' => [
        // 'displayCond' => 'FIELD:tx_hhslider_pagination:=:0',
        'config' => [
            'type' => 'check',
            'renderType' => 'checkboxLabeledToggle',
            'items' => [
                0 => [
                    0 => '',
                    1 => '',
                    'labelChecked' => 'Enabled',
                    'labelUnchecked' => 'Disabled',
                ],
            ],
            'default' => 0
        ],
        'exclude' => '1',
        'label' => 'LLL:EXT:hh_slider/Resources/Private/Language/locallang_db.xlf:tt_content.tx_hhslider_thumbnails',
    ],
    'tx_hhslider_responsive_part' => [
        'exclude' => 1,
        'label' => 'LLL:EXT:hh_slider/Resources/Private/Language/locallang_db.xlf:tt_content.tx_hhslider_responsive_part',
        'description' => 'LLL:EXT:hh_slider/Resources/Private/Language/locallang_db.xlf:tt_content.tx_hhslider_responsive_part.description',
        'config' => [
            'type' => 'text',
            'renderType' => 't3editor',
            'format' => 'html',
            'rows' => 7,
            'eval' => 'trim, HauerHeinrich\\HhSlider\\Evaluation\\JsonEvaluation',
        ],
    ],
    'tx_hhslider_sorting' => [
        'label' => 'LLL:EXT:hh_slider/Resources/Private/Language/locallang_db.xlf:tt_content.tx_hhslider_sorting',
        'displayCond' => 'FIELD:tx_hhslider_content_type:=:3',
        'config' => [
            'items' => [
                ['name (default)', 'name'],
                ['uid', 'uid'],
                ['extension (e.g. jpg, png)', 'extension'],
                ['file size', 'size'],
                ['creation date', 'creation_date'],
                ['modification date', 'modification_date'],
            ],
            'default' => 'name',
            'renderType' => 'selectSingle',
            'type' => 'select',
        ],
        'exclude' => '1',
    ],
    'tx_hhslider_sorting_direction' => [
        'label' => 'LLL:EXT:hh_slider/Resources/Private/Language/locallang_db.xlf:tt_content.tx_hhslider_sorting_direction',
        'displayCond' => 'FIELD:tx_hhslider_content_type:=:3',
        'config' => [
            'items' => [
                ['ascending (default)', 'ascending'],
                ['descending', 'descending'],
            ],
            'default' => 'ascending',
            'renderType' => 'selectSingle',
            'type' => 'select',
        ],
        'exclude' => '1',
    ],
];

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

$tempPalettes = [
    'slider_autoplay_config' => [
        'showitem' => 'tx_hhslider_autoplay, tx_hhslider_autoplay_speed', 'canNotCollapse' => 1
    ],
    'slider_animation_config' => [
        'showitem' => 'tx_hhslider_animation, tx_hhslider_animation_direction, tx_hhslider_animation_speed', 'canNotCollapse' => 1
    ],
    'slider_navigation' => [
        'showitem' => 'tx_hhslider_arrows, tx_hhslider_pagination, tx_hhslider_thumbnails', 'canNotCollapse' => 1
    ],
    'slider_slide' => [
        'showitem' => 'tx_hhslider_slides_per_view, tx_hhslider_slideby', 'canNotCollapse' => 1
    ],
    'slider_sorting' => [
        'showitem' => 'tx_hhslider_sorting, tx_hhslider_sorting_direction', 'canNotCollapse' => 1
    ],
];

$GLOBALS['TCA']['tt_content']['palettes'] += $tempPalettes;

$tempTypes = [
    'hhslider_hh_slider' => [
        'columnsOverrides' => [
            'bodytext' => [
                'config' => [
                    'richtextConfiguration' => 'default',
                    'enableRichtext' => 1,
                ],
            ],
            'assets' => [
                'displayCond' => 'FIELD:tx_hhslider_content_type:=:1',
                'label' => 'Images',
                'config' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::getFileFieldTCAConfig(
                    'assets',
                    [],
                    'jpg, jpeg, png, svg, webp, webm, mp4, ogg, ogv'
                ),
            ],
        ],

        'showitem' => '
            --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:general,
            --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:palette.general;general,
                --palette--;;headers,
                tx_hhslider_content_type,
                assets,
                tx_hhslider_child_content,
                tx_hhslider_folder,
                --palette--;;slider_sorting,
                tx_hhslider_content_text,
            --div--;Options,
                --palette--;;slider_autoplay_config,
                --palette--;;slider_animation_config,
                tx_hhslider_loop,
                --palette--;;slider_slide,
                tx_hhslider_disable_on_interaction,
                tx_hhslider_centered_slides,
                --palette--;;slider_navigation,
                tx_hhslider_responsive_part,
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
    ],
];

$GLOBALS['TCA']['tt_content']['types'] += $tempTypes;

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile(
    'hh_slider',
    'Configuration/TypoScript/',
    'hh_slider'
);
