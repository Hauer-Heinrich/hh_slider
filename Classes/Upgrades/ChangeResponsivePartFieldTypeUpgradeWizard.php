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

#[UpgradeWizard('hhSlider_changeResponsivePartFieldTypeUpgradeWizard')]
final class ChangeResponsivePartFieldTypeUpgradeWizard implements UpgradeWizardInterface, ChattyInterface {

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
        return 'EXT:hh_slider - Update DB:field tx_hhslider_responsive_part';
    }

    /**
     * Return the description for this wizard
     */
    public function getDescription(): string {
        return 'Update DB:field tx_hhslider_responsive_part from text to json.';
    }

    /**
     * Execute the update
     *
     * Called when a wizard reports that an update is necessary
     */
    public function executeUpdate(): bool {
        if($this->updateNecessary()) {
            $connection = GeneralUtility::makeInstance(ConnectionPool::class)
                ->getConnectionForTable('tt_content');

            $queryBuilder = GeneralUtility::makeInstance(ConnectionPool::class)->getQueryBuilderForTable('tt_content');
            $queryBuilder->getRestrictions()->removeAll();

            try {
                $queryBuilder->update('tt_content');
                $queryBuilder->where(
                    $queryBuilder->expr()->eq('tx_hhslider_responsive_part', $queryBuilder->createNamedParameter(''))
                );
                $queryBuilder->set('tx_hhslider_responsive_part', NULL);
                $queryBuilder->executeStatement();


                // Führe die Änderung durch
                $connection->executeStatement(
                    'ALTER TABLE `tt_content` CHANGE `tx_hhslider_responsive_part` `tx_hhslider_responsive_part` JSON DEFAULT NULL'
                );

                return true;
            } catch (\Doctrine\DBAL\Exception $e) {
                throw $e;
            }
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
        $connection = GeneralUtility::makeInstance(ConnectionPool::class)
            ->getConnectionForTable('tt_content');

        $schemaManager = $connection->createSchemaManager();

        // Prüfen, ob Spalte existiert
        if ($schemaManager->tablesExist(['tt_content'])) {
            $columns = $schemaManager->listTableColumns('tt_content');

            if (isset($columns['tx_hhslider_responsive_part'])) {
                $column = $columns['tx_hhslider_responsive_part'];

                // Der Typ ist ein Doctrine\DBAL\Types\Type-Objekt
                $type = $column->getType(); // z. B. Doctrine\DBAL\Types\JsonType

                // Der Name ist z. B. 'text', 'json', 'string'
                if(!$type instanceof \Doctrine\DBAL\Types\JsonType) {
                    return true;
                }
            }
        }

        // Wenn das Feld nicht existiert, kein Update nötig
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
}
