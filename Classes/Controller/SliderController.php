<?php
namespace HauerHeinrich\HhSlider\Controller;

/**
 * This file is part of the TYPO3 CMS project.
 *
 * It is free software; you can redistribute it and/or modify it under
 * the terms of the GNU General Public License, either version 2
 * of the License, or any later version.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * The TYPO3 project - inspiring people to share!
 */

// use \TYPO3\CMS\Extbase\Utility\DebuggerUtility;
use \Psr\Http\Message\ResponseInterface;
use \TYPO3\CMS\Extbase\Mvc\Controller\ActionController;
use \TYPO3\CMS\Core\Database\Connection;
use \TYPO3\CMS\Core\Resource\FileReference;
use \TYPO3\CMS\Core\Resource\FileRepository;
use \TYPO3\CMS\Core\Resource\StorageRepository;
use \TYPO3\CMS\Core\Database\ConnectionPool;

/**
 * Class SliderController
 */
class SliderController extends ActionController {

    public function __construct(
        private readonly ConnectionPool $connectionPool,
        private readonly FileRepository $fileRepository,
        private readonly StorageRepository $storageRepository,
    ) {}

    /**
     * Settings aus dem ConfigurationManager ziehen und zuweisen
     * @return void
     */
    public function initializeView(): void {
        $this->view->assignMultiple([
            'settings' => $this->settings,
            'data' => $this->request->getAttribute('currentContentObject')->data
        ]);
    }

    /**
     * action list
     * @return void
     */
    public function sliderAction(): ResponseInterface {
        $pluginData = $this->request->getAttribute('currentContentObject')->data;
        $items = [];

        if(!empty($pluginData)) {
            switch (intval($pluginData['tx_hhslider_content_type'])) {
                case 2:
                    // ContentElements
                    if(!empty($pluginData['tx_hhslider_child_content'])) {
                        $queryBuilder = $this->connectionPool->getQueryBuilderForTable('tt_content');

                        $items = $queryBuilder
                            ->select('*')
                            ->from('tt_content')
                            ->where(
                                $queryBuilder->expr()->isNotNull('tx_hhslider_child_content_parent'),
                                $queryBuilder->expr()->neq('tx_hhslider_child_content_parent', $queryBuilder->createNamedParameter(0, Connection::PARAM_INT)),
                                $queryBuilder->expr()->eq('tx_hhslider_child_content_parent', $queryBuilder->createNamedParameter($pluginData['uid'], Connection::PARAM_INT))
                            )
                            ->executeQuery()->fetchAllAssociative();
                    }
                    break;

                case 3:
                    // Selected folder
                    if(!empty($pluginData['tx_hhslider_folder'])) {
                        // Split typo3 path into storageId and relative folderpath to that storageId,
                        // like "1:/user_uploads/my_directory" becomes [1, "/user_uploads/my_directory"]
                        $folderInfo = \explode(':', $pluginData['tx_hhslider_folder'], 2);

                        // $storage = $resourceFactory->getDefaultStorage(); // DefaultStorageUID = 1
                        $storage = $this->storageRepository->getStorageObject(intval($folderInfo[0]));
                        $folder = $storage->getFolder($folderInfo[1]);
                        $items = $storage->getFilesInFolder($folder);
                    }
                    break;

                default:
                    // Default: selected images
                    /** @var FileReference[] $fileObjects */
                    $items = $this->fileRepository->findByRelation('tt_content', 'assets', \intval($pluginData['uid']));
                    break;
            }
        }

        $this->view->assign('items', $items);

        return $this->htmlResponse();
    }
}
