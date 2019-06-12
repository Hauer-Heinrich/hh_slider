<?php
namespace HauerHeinrich\HhSlider\ViewHelpers;

/***************************************************************
 * Copyright notice
 *
 * (c) 2018 Christian Hackl <hackl.chris@googlemail.com>
 * All rights reserved
 *
 * This script is part of the TYPO3 project. The TYPO3 project is
 * free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 *
 * The GNU General Public License can be found at
 * http://www.gnu.org/copyleft/gpl.html.
 *
 * This script is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * This copyright notice MUST APPEAR in all copies of the script!
 * Example
 * <html xmlns:f="http://typo3.org/ns/TYPO3/CMS/Fluid/ViewHelpers"
 *   xmlns:hh="http://typo3.org/ns/VENDOR/NAMESPACE/ViewHelpers"
 *   data-namespace-typo3-fluid="true">
 *
 *  <hh:addAssetsData type="js">
 *  or
 *  <hh:addAssetsData type="js" where="header">
 */

// use TYPO3\CMS\Extbase\Utility\DebuggerUtility;
use TYPO3\CMS\Core\Utility\GeneralUtility;

class AddAssetsDataViewHelper extends \TYPO3\CMS\Fluid\Core\ViewHelper\AbstractViewHelper {
    public function initializeArguments() {
        $this->registerArgument('type', 'string', 'Can be css or js or json', true);
        $this->registerArgument('where', 'string', 'Can be header (header is default for css) or footer (footer is default for js)', false);
        $this->registerArgument('file', 'string', 'Can be css or js', false);
        $this->registerArgument('compress', 'boolean', 'true / false - default=false - only for external files', false);
    }

    /**
     * Simple Fluid Viewhelper to add data to the html header tag
     * @param string $tag
     */
    public function render() {
        $pageRender = GeneralUtility::makeInstance(\TYPO3\CMS\Core\Page\PageRenderer::class);
        $compress = $this->arguments['compress'] ? $this->arguments['compress'] : false;

        switch ($this->arguments['type']) {
            case 'css':
                $where = $this->arguments['where'] ? 'additional'.ucfirst($this->arguments['where']).'Data' : 'additionalHeaderData';
                if($GLOBALS['TSFE']->$where['sliderCSS']) {
                    $searchReplaceArray = array(
                        '<style>' => '',
                        '</style>' => ''
                    );
                    $resultOLD = str_replace(
                        array_keys($searchReplaceArray),
                        array_values($searchReplaceArray),
                        $GLOBALS['TSFE']->$where['sliderCSS']
                    );
                    $resultNEW = str_replace(
                        array_keys($searchReplaceArray),
                        array_values($searchReplaceArray),
                        trim($this->renderChildren())
                    );

                    $GLOBALS['TSFE']->$where['sliderCSS'] = "<style>" . $resultOLD . $resultNEW ."</style>";
                } else {
                    $GLOBALS['TSFE']->$where['sliderCSS'] = htmlspecialchars(trim($this->renderChildren()));
                }

                // ToDo: $pageRender->addCssInlineBlock();
                break;
            case 'js':
                $where = $this->arguments['where'] ? 'additional'.ucfirst($this->arguments['where']).'Data' : 'additionalFooterData';
                if($GLOBALS['TSFE']->$where['sliderJS']) {
                    $searchReplaceArray = array(
                        '<script>' => '',
                        '</script>' => ''
                    );
                    $resultOLD = str_replace(
                        array_keys($searchReplaceArray),
                        array_values($searchReplaceArray),
                        $GLOBALS['TSFE']->$where['sliderJS']
                    );
                    $resultNEW = str_replace(
                        array_keys($searchReplaceArray),
                        array_values($searchReplaceArray),
                        trim($this->renderChildren())
                    );

                    $GLOBALS['TSFE']->$where['sliderJS'] = "<script>" . $resultOLD . $resultNEW ."</script>";
                } else {
                    $GLOBALS['TSFE']->$where['sliderJS'] = trim($this->renderChildren());
                }

                // ToDo: $pageRender->addJsFooterInlineCode();  ->addJsInlineCode();
                break;
            case 'cssFile':
                $pageRender->addCssFile(trim($this->arguments['file']), 'stylesheet', 'all');
                break;
            case 'jsFile':
                if($this->arguments['where'] == "header") {
                    $pageRender->addJsFile(trim($this->arguments['file']), '', $compress, false, '', true, '|', false, '', true);
                } else {
                    $pageRender->addJsFooterFile(trim($this->arguments['file']), '', $compress, false, '', true, '|', false, '', true);
                }
                break;
            case 'json':
                if($this->arguments['where'] == "header") {
                    $pageRender->addHeaderData(trim($this->renderChildren()));
                } else {
                    $pageRender->addFooterData(trim($this->renderChildren()));
                }
                break;
            default:
                $GLOBALS['TSFE']->additionalFooterData[] = "<div class='error'>ERROR: no or wrong tag in AddHeaderDataViewHelper</div>";
                break;
        }
    }
}
