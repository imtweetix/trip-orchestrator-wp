<?php

if( !function_exists('wanderers_mkdf_get_blog_holder_params') ) {
    /**
     * Function that generates params for holders on blog templates
     */
    function wanderers_mkdf_get_blog_holder_params($params) {
        $params_list = array();

        $params_list['holder'] = 'mkdf-container';
        $params_list['inner'] = 'mkdf-container-inner clearfix';

        return $params_list;
    }

    add_filter( 'wanderers_mkdf_blog_holder_params', 'wanderers_mkdf_get_blog_holder_params' );
}

if( !function_exists('wanderers_mkdf_get_blog_single_holder_classes') ) {
    /**
     * Function that generates blog holder classes for single blog page
     */
    function wanderers_mkdf_get_blog_single_holder_classes($classes) {
        $sidebar_classes   = array();
        $sidebar_classes[] = 'mkdf-grid-large-gutter';
	
	    $classes = $classes . ' ' . implode(' ', $sidebar_classes);
	    
        return $classes;
    }

    add_filter( 'wanderers_mkdf_blog_single_holder_classes', 'wanderers_mkdf_get_blog_single_holder_classes' );
}

if( !function_exists('wanderers_mkdf_blog_part_params') ) {
    function wanderers_mkdf_blog_part_params($params) {

        $part_params = array();
        $part_params['title_tag'] = 'h3';
        $part_params['link_tag'] = 'h3';
        $part_params['quote_tag'] = 'h3';

        return array_merge($params, $part_params);
    }

    add_filter( 'wanderers_mkdf_blog_part_params', 'wanderers_mkdf_blog_part_params' );
}