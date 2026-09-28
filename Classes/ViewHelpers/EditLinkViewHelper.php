<?php
namespace HauerHeinrich\HhSlider\ViewHelpers;

use \TYPO3\CMS\Backend\Utility\BackendUtility;
use \TYPO3\CMS\Core\Type\Bitmask\Permission;
use \TYPO3\CMS\Core\Authentication\BackendUserAuthentication;
use \TYPO3\CMS\Core\Utility\GeneralUtility;
use \TYPO3\CMS\Core\Http\NormalizedParams;
use \TYPO3Fluid\Fluid\Core\ViewHelper\AbstractTagBasedViewHelper;

class EditLinkViewHelper extends AbstractTagBasedViewHelper {

    /**
     * Name of the tag to be created by this view helper
     *
     * @var string
     * @api
     */
    protected $tagName = 'a';
    protected bool $doEdit = true;

    protected function getBackendUser(): BackendUserAuthentication {
        return $GLOBALS['BE_USER'];
    }

    public function initializeArguments(): void {
        $this->registerArgument('element', 'array', '', true);
    }

    public function render(): string {
        $element = $this->arguments['element'];

        if ($this->doEdit && $this->canEditContentElement($element)) {
            $request = $GLOBALS['TYPO3_REQUEST'];

            /** @var NormalizedParams $normalizedParams */
            $normalizedParams = $request->getAttribute('normalizedParams');
            $returnUrl = $normalizedParams->getRequestUri();

            $urlParameters = [
                'edit' => [
                    'tt_content' => [
                        $element['record']->getUid() => 'edit'
                    ]
                ],
                'returnUrl' => $returnUrl
            ];
            $backendUriBuilder = GeneralUtility::makeInstance(\TYPO3\CMS\Backend\Routing\UriBuilder::class);
            $uri = $backendUriBuilder->buildUriFromRoute('record_edit', $urlParameters);

            $this->tag->addAttribute('href', $uri);
        }

        $this->tag->setContent($this->renderChildren());
        $this->tag->forceClosingTag(true);

        return $this->tag->render();
    }

    private function canEditContentElement(array $row): bool {
        $backendUser = $this->getBackendUser();
        if ($backendUser->isAdmin()) {
            return true;
        }

        $page = BackendUtility::getRecord('pages', (int)$row['pid']);
        if (
            $page === null
            || !empty($page['editlock'])
            || !$backendUser->doesUserHaveAccess($page, Permission::CONTENT_EDIT)
        ) {
            return false;
        }

        return $backendUser->checkRecordEditAccess('tt_content', $row)->isAllowed;
    }
}
