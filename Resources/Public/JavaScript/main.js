// Chrome's NodeList forEach Implementation
if(window.NodeList && !NodeList.prototype.forEach){
    NodeList.prototype.forEach = Array.prototype.forEach;
}

// Initialize the Tiny Slider
// (https://github.com/ganlanyuan/tiny-slider)
var sliderArray = {};
document.addEventListener("DOMContentLoaded", function(e) {
    var json = document.querySelectorAll(".hhSliderJson");

    if (json) {
        json.forEach(function(cnf) {
            var config = JSON.parse(cnf.innerHTML),
                uid = config.uid,
                sliderContainer = document.querySelector("#c"+uid);

            if(typeof sliderContainer != "undefined") {
                sliderArray[uid] = tns(config),
                    arrowsPrev = config.prevButton ? sliderContainer.querySelector(config.prevButton) : '',
                    arrowsNext = config.nextButton ? sliderContainer.querySelector(config.nextButton) : '',
                    arrowContainer = sliderContainer.querySelector(".tns-outer")
                    disableOnInteraction = config.disableOnInteraction ? config.disableOnInteraction : false,
                    btnAutoplay = sliderContainer.querySelector(".btn-autoplay");

                if(arrowsPrev) {
                    arrowContainer.appendChild(arrowsPrev);
                    arrowsPrev.addEventListener('click', function() {
                        sliderArray[uid].goTo('prev');
                        if(disableOnInteraction !== "false") {
                            pause();
                        }
                    }, false);
                }
                if(arrowsNext) {
                    arrowContainer.appendChild(arrowsNext);
                    arrowsNext.addEventListener('click', function() {
                        sliderArray[uid].goTo('next');
                        if(disableOnInteraction !== "false") {
                            pause();
                        }
                    }, false);
                }

                var pagination = sliderContainer.querySelector(".pagination");
                if(pagination) {
                    var items = pagination.getElementsByTagName("button"),
                        itemsLength = items.length;
                    for (let i = 0; i < itemsLength; i++) {
                        items[i].addEventListener("click", function() {
                            var clickedElement = i;
                            sliderArray[uid].goTo(clickedElement);
                            if(disableOnInteraction !== "false") {
                                pause();
                            }
                        });
                    }

                    sliderArray[uid].events.on("indexChanged", function(info, eventName) {
                        // removeClass(pagination.getElementsByClassName("tns-nav-active")[0], "tns-nav-active");
                        // addClass(items[info.displayIndex - 1], "tns-nav-active");

                        pagination.querySelector(".tns-nav-active").classList.remove("tns-nav-active");
                        items[info.displayIndex - 1].classList.add("tns-nav-active");
                    });
                }

                // btn autoplay only appears if disableOnInteraction is true
                if(btnAutoplay) {
                    btnAutoplay.addEventListener("click", function() {
                        sliderArray[uid].play();
                        btnAutoplay.classList.add("disabled");
                    });
                }

                sliderArray[uid].events.on("dragEnd", function(info, eventName) {
                    if(disableOnInteraction !== "false") {
                        pause();
                    }
                });

                sliderArray[uid].events.on("touchEnd", function(info, eventName) {
                    if(disableOnInteraction !== "false") {
                        pause();
                    }
                });

                function pause() {
                    sliderArray[uid].pause();
                    if(btnAutoplay) {
                        btnAutoplay.classList.remove("disabled");
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
