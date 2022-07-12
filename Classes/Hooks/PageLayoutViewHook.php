<?php
namespace HauerHeinrich\HhSlider\Hooks;

// use \TYPO3\CMS\Extbase\Utility\DebuggerUtility;
use TYPO3\CMS\Backend\View\PageLayoutView;

class PageLayoutViewHook {

    /**
     * contentIsUsed
     *
     * @param array $params
     * @return boolean
     */
    public function contentIsUsed(array $params): bool {
        if($params['used']) {
            return true;
        }

        $record = $params['record'];
        if($params['used'] === false && $record['colPos'] === 999) {
            return $record['colPos'] === 999 && !empty($record['tx_hhslider_child_content_parent']);
        }

        return false;
    }
}
