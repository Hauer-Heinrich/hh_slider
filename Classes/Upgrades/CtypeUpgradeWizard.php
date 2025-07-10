<?php
declare(strict_types=1);

namespace HauerHeinrich\HhSlider\Upgrades;

use \Symfony\Component\Console\Output\OutputInterface;
// use \TYPO3\CMS\Extbase\Utility\DebuggerUtility;
use \TYPO3\CMS\Install\Attribute\UpgradeWizard;
use \TYPO3\CMS\Install\Updates\UpgradeWizardInterface;
use \TYPO3\CMS\Install\Updates\DatabaseUpdatedPrerequisite;
use \TYPO3\CMS\Install\Updates\ChattyInterface;
use \TYPO3\CMS\Core\Utility\GeneralUtility;
use \TYPO3\CMS\Core\Database\ConnectionPool;
use \TYPO3\CMS\Core\Database\Connection;

#[UpgradeWizard('hhSlider_ctypeUpgradeWizard')]
final class CtypeUpgradeWizard implements UpgradeWizardInterface, ChattyInterface {

    /**
     * @var OutputInterface
     */
    protected $output;

    /**
     * Setter injection for output into upgrade wizards
     */
    public function setOutput(OutputInterface $output): void {
        $this->output = $output;
    }

    /**
     * Return the speaking name of this wizard
     */
    public function getTitle(): string {
        return 'EXT:hh_slider - Update CType';
    }

    /**
     * Return the description for this wizard
     */
    public function getDescription(): string {
        return 'Updates CType from hhslider_hh_slider to hhslider_slider.';
    }

    /**
     * Execute the update
     *
     * Called when a wizard reports that an update is necessary
     */
    public function executeUpdate(): bool {
        $affectedRows = $this->getAffectedRows();

        if(empty($affectedRows)) {
            return true;
        }

        $this->output->writeln('Performing ' . count($affectedRows) . ' database operations.');

        $queryBuilder = GeneralUtility::makeInstance(ConnectionPool::class)->getQueryBuilderForTable('tt_content');
        $queryBuilder->getRestrictions()->removeAll();

        foreach ($affectedRows as $row) {
            $queryBuilder->update('tt_content');
            $queryBuilder->where(
                $queryBuilder->expr()->eq('uid', $row['uid'])
            );
            $queryBuilder->set('CType', 'hhslider_slider');
            $queryBuilder->executeStatement();
        }

        return true;
    }

    /**
     * Is an update necessary?
     *
     * Is used to determine whether a wizard needs to be run.
     * Check if data for migration exists.
     *
     * @return bool Whether an update is required (TRUE) or not (FALSE)
     */
    public function updateNecessary(): bool {
        $queryBuilder = GeneralUtility::makeInstance(ConnectionPool::class)->getQueryBuilderForTable('tt_content');
        $queryBuilder->getRestrictions()->removeAll();
        $whereExpressions = [];

        $whereExpressions[] = $queryBuilder->expr()->eq('CType', $queryBuilder->createNamedParameter('hhslider_hh_slider', Connection::PARAM_STR));

        $queryBuilder
            ->select('uid', 'CType')
            ->from('tt_content');
        $queryBuilder->where(...$whereExpressions);
        $results = $queryBuilder->executeQuery()->fetchAllAssociative();

        if(!empty($results)) {
            return true;
        }

        return false;
    }

    /**
     * Returns an array of class names of prerequisite classes
     *
     * This way a wizard can define dependencies like "database up-to-date" or
     * "reference index updated"
     *
     * @return string[]
     */
    public function getPrerequisites(): array {
        // Add your logic here
        return [
            DatabaseUpdatedPrerequisite::class,
        ];
    }

    protected function getAffectedRows(): array {
        $queryBuilder = GeneralUtility::makeInstance(ConnectionPool::class)->getQueryBuilderForTable('tt_content');
        $queryBuilder->getRestrictions()->removeAll();
        $whereExpressions = [];

        $whereExpressions[] = $queryBuilder->expr()->eq('CType', $queryBuilder->createNamedParameter('hhslider_hh_slider', Connection::PARAM_STR));

        $queryBuilder
            ->select('uid', 'CType')
            ->from('tt_content');
        $queryBuilder->where(...$whereExpressions);
        $results = $queryBuilder->executeQuery()->fetchAllAssociative();

        if(!empty($results) && \is_array($results)) {
            return $results;
        }

        return [];
    }
}
