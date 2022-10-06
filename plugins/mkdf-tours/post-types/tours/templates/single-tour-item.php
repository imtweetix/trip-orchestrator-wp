<?php

get_header();

wanderers_mkdf_get_title();

do_action('wanderers_mkdf_before_main_content');

mkdf_tours_get_single_tour_item();

get_footer();

?>