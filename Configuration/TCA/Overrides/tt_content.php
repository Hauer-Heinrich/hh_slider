<?php
defined('TYPO3') || die('Access denied.');

use \TYPO3\CMS\Core\Utility\GeneralUtility;
use \TYPO3\CMS\Extbase\Utility\ExtensionUtility;
use \TYPO3\CMS\Core\Utility\ExtensionManagementUtility;

call_user_func(function(string $extensionKey) {
    // hhslider_hh_slider
    $pluginName = 'Slider';
    $extensionName = strtolower(GeneralUtility::underscoredToUpperCamelCase($extensionKey));
    $CType = $extensionName . '_' . strtolower($pluginName);

    $pluginIdentifier = ExtensionUtility::registerPlugin(
        $extensionKey,
        $pluginName,
        'LLL:EXT:hh_slider/Resources/Private/Language/locallang_db_new_content_el.xlf:wizards.newContentElement.hh_slider_title',
        'tx_hhslider_hh_slider',
        'default',
        'LLL:EXT:hh_slider/Resources/Private/Language/locallang_db_new_content_el.xlf:wizards.newContentElement.hh_slider_description'
    );

    $GLOBALS['TCA']['tt_content']['ctrl']['typeicon_classes'][$CType] = 'tx_hhslider_hh_slider';

    $GLOBALS['TCA']['tt_content']['columns']['colPos']['config']['items'][] = [
        'hh_slider_content_elements',
        988,
    ];

    ExtensionManagementUtility::addTCAcolumns('tt_content',
        [
            'tx_hhslider_animation' => [
                'exclude' => '1',
                'label' => 'LLL:EXT:hh_slider/Resources/Private/Language/locallang_db.xlf:tt_content.tx_hhslider_animation',
                'config' => [
                    'items' => [
                        0 => [
                            0 => 'LLL:EXT:hh_slider/Resources/Private/Language/locallang_db.xlf:tt_content.tx_hhslider_animation.I.0',
                            1 => 'slide',
                        ],
                        1 => [
                            0 => 'LLL:EXT:hh_slider/Resources/Private/Language/locallang_db.xlf:tt_content.tx_hhslider_animation.I.1',
                            1 => 'fade',
                        ],
                    ],
                    'renderType' => 'selectSingle',
                    'type' => 'select',
                ],
            ],
            'tx_hhslider_animation_direction' => [
                'exclude' => '1',
                'label' => 'LLL:EXT:hh_slider/Resources/Private/Language/locallang_db.xlf:tt_content.tx_hhslider_animation_direction',
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
            ],
            'tx_hhslider_animation_speed' => [
                'exclude' => '1',
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
            ],
            'tx_hhslider_arrows' => [
                'exclude' => '1',
                'label' => 'LLL:EXT:hh_slider/Resources/Private/Language/locallang_db.xlf:tt_content.tx_hhslider_arrows',
                'config' => [
                    'type' => 'check',
                    'renderType' => 'checkboxLabeledToggle',
                    'items' => [
                        0 => [
                            'label' => '',
                            'labelChecked' => 'LLL:EXT:hh_slider/Resources/Private/Language/locallang_db.xlf:tt_content.tx_hhslider_arrows.enabled',
                            'labelUnchecked' => 'LLL:EXT:hh_slider/Resources/Private/Language/locallang_db.xlf:tt_content.tx_hhslider_arrows.disabled',
                        ],
                    ],
                ],
            ],
            'tx_hhslider_startstop' => [
                'exclude' => '1',
                'label' => 'LLL:EXT:hh_slider/Resources/Private/Language/locallang_db.xlf:tt_content.tx_hhslider_startstop',
                'description' => '',
                'config' => [
                    'type' => 'check',
                    'renderType' => 'checkboxLabeledToggle',
                    'items' => [
                        0 => [
                            'label' => '',
                            'labelChecked' => 'Enabled',
                            'labelUnchecked' => 'Disabled',
                        ],
                    ],
                ],
            ],
            'tx_hhslider_autoplay' => [
                'exclude' => '1',
                'label' => 'LLL:EXT:hh_slider/Resources/Private/Language/locallang_db.xlf:tt_content.tx_hhslider_autoplay',
                'onChange' => 'reload',
                'config' => [
                    'type' => 'check',
                    'renderType' => 'checkboxLabeledToggle',
                    'items' => [
                        0 => [
                            'label' => '',
                            'labelChecked' => 'LLL:EXT:hh_slider/Resources/Private/Language/locallang_db.xlf:tt_content.tx_hhslider_autoplay.enabled',
                            'labelUnchecked' => 'LLL:EXT:hh_slider/Resources/Private/Language/locallang_db.xlf:tt_content.tx_hhslider_autoplay.disabled',
                        ],
                    ],
                    'default' => 1
                ],
            ],
            'tx_hhslider_autoplay_speed' => [
                'exclude' => '1',
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
            ],
            'tx_hhslider_centered_slides' => [
                'exclude' => '1',
                'label' => 'LLL:EXT:hh_slider/Resources/Private/Language/locallang_db.xlf:tt_content.tx_hhslider_centered_slides',
                'config' => [
                    'type' => 'check',
                    'renderType' => 'checkboxLabeledToggle',
                    'items' => [
                        0 => [
                            'label' => '',
                            'labelChecked' => 'Enabled',
                            'labelUnchecked' => 'Disabled',
                        ],
                    ],
                    'default' => 1
                ],
            ],
            'tx_hhslider_child_content' => [
                'exclude' => true,
                'label' => 'LLL:EXT:hh_slider/Resources/Private/Language/locallang_db.xlf:tt_content.tx_hhslider_child_content',
                'displayCond' => 'FIELD:tx_hhslider_content_type:=:2',
                'config' => [
                    'type' => 'inline',
                    'allowed' => 'tt_content',
                    'foreign_table' => 'tt_content',
                    'foreign_sortby' => 'sorting',
                    'foreign_field' => 'tx_hhslider_child_content_parent',
                    'minitems' => 0,
                    'maxitems' => 99,
                    'appearance' => [
                        'collapseAll' => true,
                        'enabledControls' => [
                            'dragdrop' => true,
                        ],
                        'expandSingle' => true,
                        'levelLinksPosition' => 'both',
                        'showAllLocalizationLink' => true,
                        'showPossibleLocalizationRecords' => true,
                        'showSynchronizationLink' => true,
                        'useSortable' => true,
                        'enabledControls' => [
                            'info' => false,
                        ],
                        'behaviour' => [
                            'allowLanguageSynchronization' => true,
                        ],
                    ],
                    'overrideChildTca' => [
                        'columns' => [
                            'colPos' => [
                                'config' => [
                                    'default' => 988,
                                    'itemsProcFunc' => \HauerHeinrich\HhSlider\Tca\ItemProcFunc::class . '->colPos',
                                ],
                            ],
                            'CType' => [
                                'config' => [
                                    'default' => 'textmedia',
                                    'itemsProcFunc' => \HauerHeinrich\HhSlider\Tca\ItemProcFunc::class . '->filterCtypes',
                                ],
                            ],
                        ],
                    ],
                ],
            ],
            'tx_hhslider_content_type' => [
                'exclude' => '1',
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
            ],
            'tx_hhslider_content_text' => [
                'exclude' => 1,
                'label' => 'Text',
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
                'exclude' => '1',
                'label' => 'LLL:EXT:hh_slider/Resources/Private/Language/locallang_db.xlf:tt_content.tx_hhslider_disable_on_interaction',
                'displayCond' => 'FIELD:tx_hhslider_autoplay:REQ:true',
                'config' => [
                    'type' => 'check',
                    'renderType' => 'checkboxLabeledToggle',
                    'items' => [
                        0 => [
                            'label' => '',
                            'labelChecked' => 'LLL:EXT:hh_slider/Resources/Private/Language/locallang_db.xlf:tt_content.tx_hhslider_disable_on_interaction.enabled',
                            'labelUnchecked' => 'LLL:EXT:hh_slider/Resources/Private/Language/locallang_db.xlf:tt_content.tx_hhslider_disable_on_interaction.disabled',
                        ],
                    ],
                ],
            ],
            'tx_hhslider_loop' => [
                'exclude' => '1',
                'label' => 'LLL:EXT:hh_slider/Resources/Private/Language/locallang_db.xlf:tt_content.tx_hhslider_loop',
                'config' => [
                    'type' => 'check',
                    'renderType' => 'checkboxLabeledToggle',
                    'items' => [
                        0 => [
                            'label' => '',
                            'labelChecked' => 'Enabled',
                            'labelUnchecked' => 'Disabled',
                        ],
                    ],
                    'default' => 1
                ],
            ],
            'tx_hhslider_pagination' => [
                'exclude' => '1',
                'label' => 'LLL:EXT:hh_slider/Resources/Private/Language/locallang_db.xlf:tt_content.tx_hhslider_pagination',
                // 'onChange' => 'reload',
                'config' => [
                    'type' => 'check',
                    'renderType' => 'checkboxLabeledToggle',
                    'items' => [
                        0 => [
                            'label' => '',
                            'labelChecked' => 'LLL:EXT:hh_slider/Resources/Private/Language/locallang_db.xlf:tt_content.tx_hhslider_pagination.enabled',
                            'labelUnchecked' => 'LLL:EXT:hh_slider/Resources/Private/Language/locallang_db.xlf:tt_content.tx_hhslider_pagination.disabled',
                        ],
                    ],
                    'default' => 0
                ],
            ],
            'tx_hhslider_slides_per_view' => [
                'exclude' => '1',
                'label' => 'LLL:EXT:hh_slider/Resources/Private/Language/locallang_db.xlf:tt_content.tx_hhslider_slides_per_view',
                'config' => [
                    'default' => '1',
                    'eval' => 'int,required',
                    'max' => '3',
                    'placeholder' => '1',
                    'type' => 'input',
                ],
            ],
            'tx_hhslider_slideby' => [
                'exclude' => '1',
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
            ],
            'tx_hhslider_thumbnails' => [
                'exclude' => '1',
                'label' => 'LLL:EXT:hh_slider/Resources/Private/Language/locallang_db.xlf:tt_content.tx_hhslider_thumbnails',
                // 'displayCond' => 'FIELD:tx_hhslider_pagination:=:0',
                'config' => [
                    'type' => 'check',
                    'renderType' => 'checkboxLabeledToggle',
                    'items' => [
                        0 => [
                            'label' => '',
                            'labelChecked' => 'LLL:EXT:hh_slider/Resources/Private/Language/locallang_db.xlf:tt_content.tx_hhslider_thumbnails.enabled',
                            'labelUnchecked' => 'LLL:EXT:hh_slider/Resources/Private/Language/locallang_db.xlf:tt_content.tx_hhslider_thumbnails.disabled',
                        ],
                    ],
                    'default' => 0
                ],
            ],
            'tx_hhslider_responsive_part' => [
                'exclude' => 1,
                'label' => 'LLL:EXT:hh_slider/Resources/Private/Language/locallang_db.xlf:tt_content.tx_hhslider_responsive_part',
                'description' => 'LLL:EXT:hh_slider/Resources/Private/Language/locallang_db.xlf:tt_content.tx_hhslider_responsive_part.description',
                'config' => [
                    'type' => 'json',
                    'placeholder' => <<<TEXT
                    {
                        "1024": {
                            "items": 2,
                            "gutter": 20
                        }
                    }
                    TEXT,
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
            'tx_hhslider_slide_to_clicked_slide' => [
                'exclude' => '1',
                'label' => 'LLL:EXT:hh_slider/Resources/Private/Language/locallang_db.xlf:tt_content.tx_hhslider_slide_to_clicked_slide',
                'description' => 'LLL:EXT:hh_slider/Resources/Private/Language/locallang_db.xlf:tt_content.tx_hhslider_slide_to_clicked_slide.description',
                'config' => [
                    'type' => 'check',
                    'renderType' => 'checkboxLabeledToggle',
                    'default' => 1,
                    'items' => [
                        0 => [
                            'label' => '',
                            'labelChecked' => 'Enabled',
                            'labelUnchecked' => 'Disabled',
                        ],
                    ],
                ],
            ],
        ]
    );

    $tempPalettes = [
        'slider_autoplay_config' => [
            'showitem' => 'tx_hhslider_autoplay, tx_hhslider_autoplay_speed', 'canNotCollapse' => 1
        ],
        'slider_animation_config' => [
            'showitem' => 'tx_hhslider_animation, tx_hhslider_animation_direction, tx_hhslider_animation_speed', 'canNotCollapse' => 1
        ],
        'slider_navigation' => [
            'showitem' => 'tx_hhslider_arrows, tx_hhslider_startstop, tx_hhslider_slide_to_clicked_slide, --linebreak--, tx_hhslider_pagination, tx_hhslider_thumbnails', 'canNotCollapse' => 1
        ],
        'slider_slide' => [
            'showitem' => 'tx_hhslider_slides_per_view, tx_hhslider_slideby', 'canNotCollapse' => 1
        ],
        'slider_sorting' => [
            'showitem' => 'tx_hhslider_sorting, tx_hhslider_sorting_direction', 'canNotCollapse' => 1
        ],
    ];
    $GLOBALS['TCA']['tt_content']['palettes'] += $tempPalettes;

    $GLOBALS['TCA']['tt_content']['types'][$CType] = [
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
                'config' => [
                    'type' => 'file',
                    'allowed' => 'jpg, jpeg, png, svg, webp, webm, mp4, ogg, ogv'
                ]
            ],
        ],
    ];

}, 'hh_slider');
