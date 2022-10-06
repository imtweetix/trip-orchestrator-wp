<?php

if ( ! function_exists( 'wanderers_mkdf_register_sidearea_opener_widget' ) ) {
	/**
	 * Function that register sidearea opener widget
	 */
	function wanderers_mkdf_register_sidearea_opener_widget( $widgets ) {
		$widgets[] = 'WanderersMkdfSideAreaOpener';
		
		return $widgets;
	}
	
	add_filter( 'mkdf_core_filter_register_widgets', 'wanderers_mkdf_register_sidearea_opener_widget' );
}