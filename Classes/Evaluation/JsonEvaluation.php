<?php
namespace HauerHeinrich\HhSlider\Evaluation;

// use TYPO3\CMS\Extbase\Utility\DebuggerUtility;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Core\Messaging\FlashMessageService;
use TYPO3\CMS\Core\Messaging\FlashMessage;

/**
 * Class for field value validation/evaluation to be used in 'eval' of TCA
 */
class JsonEvaluation {

    public function __construct() {
        // Add JavaScript for clientside evaluation
        $pageRenderer = GeneralUtility::makeInstance(\TYPO3\CMS\Core\Page\PageRenderer::class);
        $pageRenderer->addJsFile('EXT:hh_slider/Resources/Public/JavaScript/jsonEvaluation.min.js');
    }

    /**
     * Server-side validation/evaluation on saving the record
     *
     * @param string $value The field value to be evaluated
     * @param string $is_in The "is_in" value of the field configuration from TCA
     * @param bool $set Boolean defining if the value is written to the database or not.
     * @return string Evaluated field value
     */
    public function evaluateFieldValue($value, $is_in, &$set) {
        $this->validateJson($value);

        return $value;
    }

    /**
     * Server-side validation/evaluation on opening the record
     *
     * @param array $parameters Array with key 'value' containing the field value from the database
     * @return string Evaluated field value
     */
    public function deevaluateFieldValue(array $parameters) {
        $value = $parameters['value'];
        $this->validateJson($value);

        return $value;
    }

    public function validateJson(string $value) {
        if(!empty($value)) {
            // check if it is a json-string
            $result = json_decode($value);
            if (json_last_error() === 0) { // JSON is valid
                return $value;
            }

            $flashMessageService = GeneralUtility::makeInstance(FlashMessageService::class);
            $messageQueue = $flashMessageService->getMessageQueueByIdentifier();

            $message = GeneralUtility::makeInstance(FlashMessage::class,
                'Slider option responsive',
                'Responsive field value is not a valid json!',
                FlashMessage::ERROR,
                false
            );

            $messageQueue->addMessage($message);
        }
    }
}
