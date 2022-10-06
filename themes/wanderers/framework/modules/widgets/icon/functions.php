<?php

if ( ! function_exists( 'wanderers_mkdf_register_icon_widget' ) ) {
	/**
	 * Function that register icon widget
	 */
	function wanderers_mkdf_register_icon_widget( $widgets ) {
		$widgets[] = 'WanderersMkdfIconWidget';
		
		return $widgets;
	}
	
	add_filter( 'mkdf_core_filter_register_widgets', 'wanderers_mkdf_register_icon_widget' );
}