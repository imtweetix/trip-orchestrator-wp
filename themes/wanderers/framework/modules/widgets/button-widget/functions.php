<?php

if ( ! function_exists( 'wanderers_mkdf_register_button_widget' ) ) {
	/**
	 * Function that register button widget
	 */
	function wanderers_mkdf_register_button_widget( $widgets ) {
		$widgets[] = 'WanderersMkdfButtonWidget';
		
		return $widgets;
	}
	
	add_filter( 'mkdf_core_filter_register_widgets', 'wanderers_mkdf_register_button_widget' );
}