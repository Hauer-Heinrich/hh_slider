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
 *  <hh:addHeaderData type="js">
 *  or
 *  <hh:addHeaderData type="js" where="header">
 */

// use TYPO3\CMS\Extbase\Utility\DebuggerUtility;

class AddHeaderDataViewHelper extends \TYPO3\CMS\Fluid\Core\ViewHelper\AbstractViewHelper {
    public function initializeArguments() {
        $this->registerArgument('type', 'string', 'Can be css or js', true);
        $this->registerArgument('where', 'string', 'Can be header (header is default for css) or footer (footer is default for js)', false);
    }

    /**
     * Simple Fluid Viewhelper to add data to the html header tag
     * @param string $tag
     */
    public function render() {
        switch ($this->arguments['type']) {
            case 'css':
                $where = $this->arguments['where'] ? 'additional'.ucfirst($this->arguments['where']).'Data' : 'additionalHeaderData';
                if($GLOBALS['TSFE']->$where['9898']) {
                    $cssContent = str_replace("<style>", "", $GLOBALS['TSFE']->$where['9898']);
                    $cssContent = str_replace("</style>", "", $cssContent);
                    $GLOBALS['TSFE']->$where['9898'] = "<style>".$cssContent . htmlspecialchars(trim($this->renderChildren())) ."</style>";
                } else {
                    $GLOBALS['TSFE']->$where['9898'] = htmlspecialchars(trim($this->renderChildren()));
                }
                break;
            case 'js':
                $where = $this->arguments['where'] ? 'additional'.ucfirst($this->arguments['where']).'Data' : 'additionalFooterData';
                if($GLOBALS['TSFE']->$where['9899']) {
                    $jsContent = str_replace("<script>", "", $GLOBALS['TSFE']->$where['9899']);
                    $jsContent = str_replace("</script>", "", $jsContent);
                    $GLOBALS['TSFE']->$where['9899'] = "<script>".$jsContent . trim($this->renderChildren()) ."</script>";
                } else {
                    $GLOBALS['TSFE']->$where['9899'] = trim($this->renderChildren());
                }
                break;
            default:
                $GLOBALS['TSFE']->additionalFooterData[] = "<div class='error'>ERROR: no or wrong tag in AddHeaderDataViewHelper</div>";
                break;
        }
    }
}
