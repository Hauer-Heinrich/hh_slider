tt_content.hhslider_hh_slider = FLUIDTEMPLATE
tt_content.hhslider_hh_slider {
    layoutRootPaths {
        0 = EXT:fluid_styled_content/Resources/Private/Layouts/
        10 = EXT:hh_slider/Resources/Private/Layouts/
        20 = {$plugin.tx_hhslider.view.layoutRootPath}
    }
    partialRootPaths {
        0 = EXT:fluid_styled_content/Resources/Private/Partials/
        10 = EXT:hh_slider/Resources/Private/Partials/
        20 = {$plugin.tx_hhslider.view.partialRootPath}
    }
    templateRootPaths {
        0 = EXT:fluid_styled_content/Resources/Private/Templates/
        10 = EXT:hh_slider/Resources/Private/Templates/
        20 = {$plugin.tx_hhslider.view.templateRootPath}
    }
    templateName = HhSlider

    dataProcessing.10 = TYPO3\CMS\Frontend\DataProcessing\FilesProcessor
    dataProcessing.10 {
        if.isTrue.field = media
        references {
            fieldName = media
            table = tt_content
        }
        as = data_media
    }

    dataProcessing.20 = TYPO3\CMS\Frontend\DataProcessing\DatabaseQueryProcessor
    dataProcessing.20 {
        if.isTrue.field = tx_hhslider_child_content
        table = tt_content
        pidInList.field = pid
        where = tx_hhslider_child_content_parent=###uid### AND deleted=0 AND hidden=0 AND colPos=###colPos###
        orderBy = sorting
        markers.colPos.value = 999
        markers.uid.field = uid
        as = data_tx_hhslider_child_content
    }

    settings {
        cssFile = {$plugin.tx_hhslider.settings.cssFile}
        jsFile = {$plugin.tx_hhslider.settings.jsFile}
    }
}
