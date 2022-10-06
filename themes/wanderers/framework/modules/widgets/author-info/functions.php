<?php

if ( ! function_exists( 'wanderers_mkdf_register_author_info_widget' ) ) {
	/**
	 * Function that register author info widget
	 */
	function wanderers_mkdf_register_author_info_widget( $widgets ) {
		$widgets[] = 'WanderersMkdfAuthorInfoWidget';
		
		return $widgets;
	}
	
	add_filter( 'mkdf_core_filter_register_widgets', 'wanderers_mkdf_register_author_info_widget' );
}