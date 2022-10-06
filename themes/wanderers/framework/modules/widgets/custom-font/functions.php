<?php

if ( ! function_exists( 'wanderers_mkdf_register_custom_font_widget' ) ) {
	/**
	 * Function that register custom font widget
	 */
	function wanderers_mkdf_register_custom_font_widget( $widgets ) {
		$widgets[] = 'WanderersMkdfCustomFontWidget';
		
		return $widgets;
	}
	
	add_filter( 'mkdf_core_filter_register_widgets', 'wanderers_mkdf_register_custom_font_widget' );
}