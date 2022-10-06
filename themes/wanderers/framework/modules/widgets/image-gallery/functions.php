<?php

if ( ! function_exists( 'wanderers_mkdf_register_image_gallery_widget' ) ) {
	/**
	 * Function that register image gallery widget
	 */
	function wanderers_mkdf_register_image_gallery_widget( $widgets ) {
		$widgets[] = 'WanderersMkdfImageGalleryWidget';
		
		return $widgets;
	}
	
	add_filter( 'mkdf_core_filter_register_widgets', 'wanderers_mkdf_register_image_gallery_widget' );
}