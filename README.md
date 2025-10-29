# hh_slider
hh_slider is a TYPO3 extension.
Integrates the [swiper-slider](https://swiperjs.com/ "swiper-slider") in TYPO3.

### Installation
... like any other TYPO3 extension [extensions.typo3.org](https://extensions.typo3.org/ "TYPO3 Extension Repository")
Don't forget to include PageTS!

### Features
- No dependencies like jQuery
- "Content type" - Select "images" if you want only slide images | select "content" if you want to slide content-elements like textmedia
- To slide other elements, for example from other extensions, simply add your own custom json to the document - like: "hh_slider\Resources\Private\Partials\Assets\SliderJson.html" - Important: className "hhSliderJson"

#### optional
##### Set CSS colors for the slider buttons
--hhslider-button-prevnext-bg-image: url("../Icons/prev-next.svg");
--hhslider-button-prevnext-bg-color: #04A0E3;
--hhslider-button-prevnext-bg-color-hover: #7cb4cc;
--hhslider-button-startstop-bg-image: url("../Icons/start-stop.svg");
--hhslider-button-startstop-bg-color: #04A0E3;
--hhslider-button-startstop-bg-color-hover: #7cb4cc;
--hhslider-pagination-button-bg: #fff;
--hhslider-pagination-button-bg-active: #ccc;
--hhslider-pagination-button-border: 3px solid #ccc;
--hhslider-pagination-button-border-active: 3px solid #ccc;

##### Restrict Content-Elements (CType) of childrecords
Example:
```
plugin.tx_hhslider {
    settings {
        allowedCtypes = textmedia, images, menu_pages,
    }
}
```

##### Translate string via TypoScript
Available strings / ID's see: EXT:hh_slider/Resources/Private/Language/locallang.xlf
More info on a11y of the slider see: [Slider A11yOptions](https://swiperjs.com/types/interfaces/types_modules_a11y.A11yOptions)
Example:
```
plugin.tx_hhslider {
    _LOCAL_LANG {
        default {
            fe.slider.userInstruction = default EN label
            fe.slider.a11y.nextSlideMessage = Next slide
        }
        de {
            fe.slider.userInstruction = DE label
            fe.slider.a11y.nextSlideMessage = Nächste Folie
        }
        cz {
            fe.slider.userInstruction = CZ label
            fe.slider.a11y.nextSlideMessage = Další snímek
        }
    }
}
```

#### Main-view
![example picture from backend](.github/images/preview-1.jpg?raw=true "Main")
#### Options-view
![example picture from backend](.github/images/preview-2.jpg?raw=true "Options")

##### Copyright notice

This repository is part of the TYPO3 project. The TYPO3 project is
free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 2 of the License, or
(at your option) any later version.

The GNU General Public License can be found at
http://www.gnu.org/copyleft/gpl.html.

This repository is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

This copyright notice MUST APPEAR in all copies of the repository!

##### License
----
GNU GENERAL PUBLIC LICENSE Version 3
