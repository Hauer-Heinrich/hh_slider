<?php
declare(strict_types=1);

namespace HauerHeinrich\HhSlider\Evaluation;

// use \TYPO3\CMS\Extbase\Utility\DebuggerUtility;
use \TYPO3\CMS\Core\Utility\GeneralUtility;
use \TYPO3\CMS\Core\Messaging\FlashMessageService;
use \TYPO3\CMS\Core\Messaging\FlashMessage;
use \TYPO3\CMS\Core\Type\ContextualFeedbackSeverity;

/**
 * Class for field value validation/evaluation to be used in 'eval' of TCA
 */
class JsonEvaluation {

    public $flashMessageService;

    public function __construct(\TYPO3\CMS\Core\Page\PageRenderer $pageRenderer, FlashMessageService $flashMessageService) {
        // Add JavaScript for clientside evaluation
        $pageRenderer->addJsFile('EXT:hh_slider/Resources/Public/JavaScript/jsonEvaluation.min.js');
        $this->flashMessageService = $flashMessageService;
    }

    /**
     * Server-side validation/evaluation on saving the record
     *
     * @param string $value The field value to be evaluated
     * @param string $is_in The "is_in" value of the field configuration from TCA
     * @param bool $set Boolean defining if the value is written to the database or not.
     * @return string Evaluated field value
     */
    public function evaluateFieldValue($value, $is_in, &$set): string {
        $this->validateJson($value);

        return $value;
    }

    /**
     * Server-side validation/evaluation on opening the record
     *
     * @param array $parameters Array with key 'value' containing the field value from the database
     * @return string Evaluated field value
     */
    public function deevaluateFieldValue(array $parameters): string {
        $value = $parameters['value'];
        $this->validateJson($value);

        return $value;
    }

    public function validateJson(string $value): bool {
        if(empty($value)) {
            return true;
        }

        // check if it is a json-string
        $result = json_decode($value);
        if (json_last_error() === 0) { // JSON is valid
            return true;
        }

        $flashMessageService = GeneralUtility::makeInstance(FlashMessageService::class);
        $messageQueue = $flashMessageService->getMessageQueueByIdentifier();

        $message = GeneralUtility::makeInstance(FlashMessage::class,
            'My dasdfasdf text',
            'Responsive field value is not a valid json!',
            ContextualFeedbackSeverity::ERROR,
            true
        );

        $messageQueue->addMessage($message);

        return false;
    }
}
