// https://github.com/ganlanyuan/tiny-slider
window.addEventListener("load", function(e){
    var json = document.querySelectorAll(".hhSliderJson");

    json.forEach(function(cnf){
        var config = JSON.parse(cnf.innerHTML),
            uid = config.uid,
            sliderContainer = document.querySelector("#c"+uid);

        if(typeof sliderContainer != "undefined") {
            var slider = tns(config),
                arrowsPrev = sliderContainer.querySelector(".slider-button-prev"),
                arrowsNext = sliderContainer.querySelector(".slider-button-next"),
                arrowContainer = sliderContainer.querySelector(".tns-outer");

            if(arrowsPrev) {
                arrowContainer.appendChild(arrowsPrev);
                arrowsPrev.addEventListener('click', function() { slider.goTo('prev'); }, false);
            }
            if(arrowsNext) {
                arrowContainer.appendChild(arrowsNext);
                arrowsNext.addEventListener('click', function() { slider.goTo('next'); }, false);
            }

            var pagination = sliderContainer.querySelector(".pagination");
            if(pagination) {
                var items = pagination.getElementsByTagName("button"),
                    itemsLength = items.length;
                for (let i = 0; i < itemsLength; i++) {
                    items[i].addEventListener("click", function() {
                        var clickedElement = i;
                        slider.goTo(clickedElement);
                    });
                }

                slider.events.on("indexChanged", function(info, eventName) {
                    // removeClass(pagination.getElementsByClassName("tns-nav-active")[0], "tns-nav-active");
                    // addClass(items[info.displayIndex - 1], "tns-nav-active");

                    pagination.querySelector(".tns-nav-active").classList.remove("tns-nav-active");
                    items[info.displayIndex - 1].classList.add("tns-nav-active");
                });
            }
        }
    });
});
