<?php
declare(strict_types=1);

/*
 * This file is part of the "hh_slider" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 */

namespace HauerHeinrich\HhSlider\EventListener;

use \TYPO3\CMS\Core\Database\Connection;
// use \TYPO3\CMS\Extbase\Utility\DebuggerUtility;
use \TYPO3\CMS\Backend\View\Event\ModifyDatabaseQueryForRecordListingEvent;

/**
 * Event for PageLayoutView to hide tt_content elements in page view
 */
final class ModifyDatabaseQueryForRecordListingEventListener {

    public function modify(ModifyDatabaseQueryForRecordListingEvent $event): void {
        if ($event->getTable() === 'tt_content' && $event->getPageId() > 0) {
            // Only hide elements which are inline, allowing for standard
            // elements to show
            $event->getQueryBuilder()->andWhere(
                $event->getQueryBuilder()->expr()->lte('tx_hhslider_child_content_parent', $event->getQueryBuilder()->createNamedParameter(0, Connection::PARAM_INT))
            );
        }
    }
}
