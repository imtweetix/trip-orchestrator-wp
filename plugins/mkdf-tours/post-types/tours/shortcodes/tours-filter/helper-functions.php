<?php
if(!function_exists('mkdf_tours_tours_filter_shortcode_helper')) {
    function mkdf_tours_tours_filter_shortcode_helper($shortcodes_class_name) {
        $shortcodes = array(
            'MikadoTours\CPT\Tours\Shortcodes\ToursFilter'
        );

        $shortcodes_class_name = array_merge($shortcodes_class_name, $shortcodes);

        return $shortcodes_class_name;
    }

    add_filter('mkdf_tours_filter_add_vc_shortcode', 'mkdf_tours_tours_filter_shortcode_helper');
}

if( !function_exists('mkdf_tours_set_tours_filter_icon_class_name_for_vc_shortcodes') ) {
    /**
     * Function that set custom icon class name for property list shortcode to set our icon for Visual Composer shortcodes panel
     */
    function mkdf_tours_set_tours_filter_icon_class_name_for_vc_shortcodes($shortcodes_icon_class_array) {
        $shortcodes_icon_class_array[] = '.icon-wpb-tours-filters';

        return $shortcodes_icon_class_array;
    }

    add_filter('mkdf_tours_filter_add_vc_shortcodes_custom_icon_class', 'mkdf_tours_set_tours_filter_icon_class_name_for_vc_shortcodes');
}