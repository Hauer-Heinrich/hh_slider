<?php

/***************************************************************
 * Extension Manager/Repository config file for ext "hh_slider".
 *
 * Auto generated 01-06-2022 12:59
 *
 * Manual updates:
 * Only the data in the array - everything else is removed by next
 * writing. "version" and "dependencies" must not be touched!
 ***************************************************************/

$EM_CONF['hh_slider'] = [
    'title' => 'Hauer-Heinrich - Slider (tiny-slider)',
    'description' => 'Hauer-Heinrich - Image and Content Slider',
    'category' => 'fe',
    'version' => '0.3.0',
    'state' => 'stable',
    'uploadfolder' => false,
    'clearcacheonload' => false,
    'author' => 'Christian Hackl',
    'author_email' => 'chackl@hauer-heinrich.de',
    'author_company' => 'www.hauer-heinrich.de',
    'constraints' => [
        'depends' => [
          'typo3' => '10.4.0-11.5.99',
          'fluid_styled_content' => '10.4.0-11.5.99',
        ],
        'conflicts' => [
        ],
        'suggests' => [
        ],
    ],
];
