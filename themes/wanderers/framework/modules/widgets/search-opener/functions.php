<?php

if ( ! function_exists( 'wanderers_mkdf_register_search_opener_widget' ) ) {
	/**
	 * Function that register search opener widget
	 */
	function wanderers_mkdf_register_search_opener_widget( $widgets ) {
		$widgets[] = 'WanderersMkdfSearchOpener';
		
		return $widgets;
	}
	
	add_filter( 'mkdf_core_filter_register_widgets', 'wanderers_mkdf_register_search_opener_widget' );
}