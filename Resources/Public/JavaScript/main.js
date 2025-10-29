// Chrome's NodeList forEach Implementation
if(window.NodeList && !NodeList.prototype.forEach){
    NodeList.prototype.forEach = Array.prototype.forEach;
}

// Initialize the Tiny Slider
// (https://github.com/ganlanyuan/tiny-slider)
var sliderArray = {};
document.addEventListener("DOMContentLoaded", function(e) {
    let json = document.querySelectorAll(".hhSliderJson");

    if (json) {
        json.forEach(function(cnf) {
            var config = JSON.parse(cnf.innerHTML),
                uid = config.uid,
                sliderContainer = document.querySelector("#tns"+uid);

            if(config.thumbs && config.thumbs.uid) {
                config.thumbs.swiper = sliderArray[config.thumbs.uid];
            }

            if(typeof sliderContainer != "undefined") {
                sliderArray[uid] = new Swiper('#tns'+uid, config);

                const btnAutoplay = document.querySelector("#c"+uid+" .slider-button-startstop");
                if(btnAutoplay) {
                    btnAutoplay.addEventListener("click", function(event) {
                        const btn = this;
                        btn.classList.toggle("disabled");

                        // Check to see if the button is pressed
                        const pressed = btnAutoplay.getAttribute("aria-pressed") === "true";

                        // Change aria-pressed to the opposite state
                        btnAutoplay.setAttribute("aria-pressed", !pressed);

                        togglePause(btn);
                    });
                }

                function togglePause(btn) {
                    if(btn.getAttribute("aria-pressed") === "true") {
                        sliderArray[uid].autoplay.pause();
                    } else {
                        sliderArray[uid].autoplay.resume();
                    }
                }
            } else {
                console.group("%c Slider Container ", "background-color: darkcyan; border: 1px solid #fff; color: #fff; padding: 5px;");
                console.error("sliderContainer undefined");
                console.error(typeof sliderContainer);
                console.groupEnd();
            }
        });
    } else {
        console.group("%c Slider Container ", "background-color: darkcyan; border: 1px solid #fff; color: #fff; padding: 5px;");
        console.error("JSON for slider undefined or not valid (class: .hhSliderJson)");
        console.error(typeof json);
        console.groupEnd();
    }
});
