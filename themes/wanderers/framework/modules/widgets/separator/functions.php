<?php

if ( ! function_exists( 'wanderers_mkdf_register_separator_widget' ) ) {
	/**
	 * Function that register separator widget
	 */
	function wanderers_mkdf_register_separator_widget( $widgets ) {
		$widgets[] = 'WanderersMkdfSeparatorWidget';
		
		return $widgets;
	}
	
	add_filter( 'mkdf_core_filter_register_widgets', 'wanderers_mkdf_register_separator_widget' );
}