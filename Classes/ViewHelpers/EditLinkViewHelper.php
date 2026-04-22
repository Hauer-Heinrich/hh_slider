<?php
namespace HauerHeinrich\HhSlider\ViewHelpers;

// use \TYPO3\CMS\Extbase\Utility\DebuggerUtility;
use \TYPO3\CMS\Core\Authentication\BackendUserAuthentication;
use \TYPO3\CMS\Core\Utility\GeneralUtility;
use \TYPO3Fluid\Fluid\Core\ViewHelper\AbstractTagBasedViewHelper;

class EditLinkViewHelper extends AbstractTagBasedViewHelper {
    /**
     * @var string
     */
    protected $tagName = 'a';

    /**
     * @var boolean
     */
    protected $doEdit = 1;

    /**
     * @return BackendUserAuthentication
     */
    protected function getBackendUser() {
        return $GLOBALS['BE_USER'];
    }

    public function initializeArguments(): void {
        $this->registerArgument('element', 'array', '', true);
    }

    public function render(): string {
        $element = $this->arguments['element'];

        if ($this->doEdit && $this->getBackendUser()->recordEditAccessInternals('tt_content', $element)) {
            $element['uid'] = '';
            $urlParameters = [
                'edit' => [
                    'tt_content' => [
                        $element['uid'] => 'edit'
                    ]
                ],
                'returnUrl' => GeneralUtility::getIndpEnv('REQUEST_URI')
            ];
            $backendUriBuilder = GeneralUtility::makeInstance(\TYPO3\CMS\Backend\Routing\UriBuilder::class);
            $uri = $backendUriBuilder->buildUriFromRoute('record_edit', $urlParameters);

            $this->tag->addAttribute('href', $uri);
        }

        $this->tag->setContent($this->renderChildren());
        $this->tag->forceClosingTag(true);

        return $this->tag->render();
    }
}
