<?php

if ( ! function_exists( 'wanderers_mkdf_register_social_icons_widget' ) ) {
	/**
	 * Function that register social icon widget
	 */
	function wanderers_mkdf_register_social_icons_widget( $widgets ) {
		$widgets[] = 'WanderersMkdfClassIconsGroupWidget';
		
		return $widgets;
	}
	
	add_filter( 'mkdf_core_filter_register_widgets', 'wanderers_mkdf_register_social_icons_widget' );
}