<?php

if ( ! function_exists( 'wanderers_mkdf_search_body_class' ) ) {
	/**
	 * Function that adds body classes for different search types
	 *
	 * @param $classes array original array of body classes
	 *
	 * @return array modified array of classes
	 */
	function wanderers_mkdf_search_body_class( $classes ) {
		$classes[] = 'mkdf-search-covers-header';
		
		return $classes;
	}
	
	add_filter( 'body_class', 'wanderers_mkdf_search_body_class' );
}

if ( ! function_exists( 'wanderers_mkdf_get_search' ) ) {
	/**
	 * Loads search HTML based on search type option.
	 */
	function wanderers_mkdf_get_search() {
		wanderers_mkdf_load_search_template();
	}
	
	add_action( 'wanderers_mkdf_before_page_header_html_close', 'wanderers_mkdf_get_search' );
	add_action( 'wanderers_mkdf_before_mobile_header_html_close', 'wanderers_mkdf_get_search' );
}

if ( ! function_exists( 'wanderers_mkdf_load_search_template' ) ) {
	/**
	 * Loads search HTML based on search type option.
	 */
	function wanderers_mkdf_load_search_template() {
		$search_icon       = '';
		$search_icon_close = '';
		
		$search_in_grid   = wanderers_mkdf_options()->getOptionValue( 'search_in_grid' ) == 'yes' ? true : false;
		$search_icon_pack = wanderers_mkdf_options()->getOptionValue( 'search_icon_pack' );
		
		if ( ! empty( $search_icon_pack ) ) {
			$search_icon       = wanderers_mkdf_icon_collections()->getSearchIcon( $search_icon_pack, true );
			$search_icon_close = wanderers_mkdf_icon_collections()->getSearchClose( $search_icon_pack, true );
		}
		
		$parameters = array(
			'search_in_grid'    => $search_in_grid,
			'search_icon'       => $search_icon,
			'search_icon_close' => $search_icon_close
		);
		
		wanderers_mkdf_get_module_template_part( 'types/covers-header/templates/covers-header', 'search', '', $parameters );
	}
}