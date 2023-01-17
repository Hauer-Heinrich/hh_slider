<?php

/***************************************************************
 * Extension Manager/Repository config file for ext "hh_slider".
 *
 * Auto generated 27-11-2018 11:22
 *
 * Manual updates:
 * Only the data in the array - everything else is removed by next
 * writing. "version" and "dependencies" must not be touched!
 ***************************************************************/

$EM_CONF['hh_slider'] = [
    'title' => 'Hauer-Heinrich - Slider (tiny-slider)',
    'description' => 'Hauer-Heinrich - Image and Content Slider',
    'category' => 'fe',
    'author' => 'Christian Hackl',
    'author_email' => 'chackl@hauer-heinrich.de',
    'author_company' => 'www.hauer-heinrich.de',
    'state' => 'stable',
    'version' => '0.2.8',
    'constraints' => [
        'depends' => [
            'typo3' => '9.5.0-11.5.99',
            'fluid_styled_content' => '9.5.0-11.5.99'
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
