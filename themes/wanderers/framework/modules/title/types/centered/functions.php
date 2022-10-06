<?php

if ( ! function_exists( 'wanderers_mkdf_set_title_centered_type_for_options' ) ) {
	/**
	 * This function set centered title type value for title options map and meta boxes
	 */
	function wanderers_mkdf_set_title_centered_type_for_options( $type ) {
		$type['centered'] = esc_html__( 'Centered', 'wanderers' );
		
		return $type;
	}
	
	add_filter( 'wanderers_mkdf_title_type_global_option', 'wanderers_mkdf_set_title_centered_type_for_options' );
	add_filter( 'wanderers_mkdf_title_type_meta_boxes', 'wanderers_mkdf_set_title_centered_type_for_options' );
}