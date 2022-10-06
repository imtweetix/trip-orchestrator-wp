<?php

if ( ! function_exists( 'wanderers_mkdf_set_title_standard_type_for_options' ) ) {
	/**
	 * This function set standard title type value for title options map and meta boxes
	 */
	function wanderers_mkdf_set_title_standard_type_for_options( $type ) {
		$type['standard'] = esc_html__( 'Standard', 'wanderers' );
		
		return $type;
	}
	
	add_filter( 'wanderers_mkdf_title_type_global_option', 'wanderers_mkdf_set_title_standard_type_for_options' );
	add_filter( 'wanderers_mkdf_title_type_meta_boxes', 'wanderers_mkdf_set_title_standard_type_for_options' );
}

if ( ! function_exists( 'wanderers_mkdf_set_title_standard_type_as_default_options' ) ) {
	/**
	 * This function set default title type value for global title option map
	 */
	function wanderers_mkdf_set_title_standard_type_as_default_options( $type ) {
		$type = 'standard';
		
		return $type;
	}
	
	add_filter( 'wanderers_mkdf_default_title_type_global_option', 'wanderers_mkdf_set_title_standard_type_as_default_options' );
}