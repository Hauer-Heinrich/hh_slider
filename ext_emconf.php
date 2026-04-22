<?php

/***************************************************************
 * Extension Manager/Repository config file for ext "hh_slider".
 *
 * Auto generated 07-07-2025 15:40
 *
 * Manual updates:
 * Only the data in the array - everything else is removed by next
 * writing. "version" and "dependencies" must not be touched!
 ***************************************************************/

$EM_CONF['hh_slider'] = [
    'title' => 'Hauer-Heinrich - Slider (swiper-slider)',
    'description' => 'Hauer-Heinrich - Image and Content Slider',
    'category' => 'fe',
    'version' => '1.1.0',
    'state' => 'stable',
    'uploadfolder' => false,
    'clearcacheonload' => false,
    'author' => 'Christian Hackl',
    'author_email' => 'chackl@hauer-heinrich.de',
    'author_company' => 'www.hauer-heinrich.de',
    'constraints' => [
        'depends' => [
            'typo3' => '13.4.0-14.3.99',
            'fluid_styled_content' => '13.4.0-14.3.99',
        ],
        'conflicts' => [
        ],
        'suggests' => [
        ],
    ],
    'autoload' => [
        'psr-4' => [
            'HauerHeinrich\\HhSlider\\' => 'Classes'
        ],
    ],
];
