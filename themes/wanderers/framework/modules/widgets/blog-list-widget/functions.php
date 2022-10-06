<?php

if ( ! function_exists( 'wanderers_mkdf_register_blog_list_widget' ) ) {
	/**
	 * Function that register blog list widget
	 */
	function wanderers_mkdf_register_blog_list_widget( $widgets ) {
		$widgets[] = 'WanderersMkdfBlogListWidget';
		
		return $widgets;
	}
	
	add_filter( 'mkdf_core_filter_register_widgets', 'wanderers_mkdf_register_blog_list_widget' );
}