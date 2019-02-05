CREATE TABLE tt_content (
    tx_hhslider_animation tinytext,
    tx_hhslider_animation_direction tinytext,
    tx_hhslider_animation_speed int(11) DEFAULT '0' NOT NULL,
    tx_hhslider_arrows int(11) DEFAULT '0' NOT NULL,
    tx_hhslider_autoplay int(11) DEFAULT '0' NOT NULL,
    tx_hhslider_autoplay_speed tinytext,
    tx_hhslider_centered_slides int(11) DEFAULT '0' NOT NULL,
    tx_hhslider_child_content int(11) unsigned DEFAULT '0' NOT NULL,
    tx_hhslider_child_content_parent int(11) unsigned DEFAULT '0' NOT NULL,
    tx_hhslider_content_text text,
    tx_hhslider_content_type tinytext,
    tx_hhslider_disable_on_interaction int(11) DEFAULT '0' NOT NULL,
    tx_hhslider_loop int(11) DEFAULT '0' NOT NULL,
    tx_hhslider_pagination int(11) DEFAULT '0' NOT NULL,
    tx_hhslider_slides_per_view tinytext,
    tx_hhslider_thumbnails int(11) DEFAULT '0' NOT NULL
);
