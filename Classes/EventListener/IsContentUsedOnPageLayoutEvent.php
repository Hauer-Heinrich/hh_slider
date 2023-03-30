<?php
declare(strict_types=1);

namespace HauerHeinrich\HhSlider\EventListener;

// use \TYPO3\CMS\Extbase\Utility\DebuggerUtility;
use \TYPO3\CMS\Backend\View\Event\IsContentUsedOnPageLayoutEvent as OriginalIsContentUsedOnPageLayoutEvent;

class IsContentUsedOnPageLayoutEvent {
    public function __invoke(OriginalIsContentUsedOnPageLayoutEvent $event): void {

        // Hide Child Content Element at module "Page" at the backend
        if($event->isRecordUsed() === false && $event->getRecord()['CType'] !== 'hhslider_hh_slider' && $event->getRecord()['colPos'] === 999) {
            $event->setUsed(true);
        }
    }
}
