/**
 * Returns bool if given string is JSON or not
 * @param {string} str
 */
function isJsonString(str) {
    try {
        JSON.parse(str);
    } catch (e) {
        return false;
    }

    return true;
}

/**
 * Check if a field has a value and check if this value is JSON
 * return bool and TYPO3 notification - mark this field visually
 * @param {object} fieldForEvaluation
 */
var jsonEvaluation = function(fieldForEvaluation) {
    var fieldValue = fieldForEvaluation.value;

    // if field has a value and this value is not JSON
    if (fieldValue.length > 0 && isJsonString(fieldValue) == false) {
        fieldForEvaluation.style.border = "1px solid red";

        // TYPO3 Notification backend
        require(['TYPO3/CMS/Backend/Notification'], function(Notification) {
            Notification.error('Slider option responsive', 'Responsive field value is not a valid json!', 5);
        });

        return false;
    }

    fieldForEvaluation.style.border = "";

    return true;
};

document.addEventListener("DOMContentLoaded", function(e) {
    var fieldForEvaluation = document.querySelector("textarea[name$='[tx_hhslider_responsive_part]']");

    fieldForEvaluation.addEventListener("focusout", function(event) { jsonEvaluation(fieldForEvaluation); }, false);
    fieldForEvaluation.addEventListener("mouseout", function(event) { jsonEvaluation(fieldForEvaluation); }, false);
});
