<?php

if(!function_exists('wanderers_mkdf_register_sticky_sidebar_widget')) {
	/**
	 * Function that register sticky sidebar widget
	 */
	function wanderers_mkdf_register_sticky_sidebar_widget($widgets) {
		$widgets[] = 'WanderersMkdfStickySidebar';
		
		return $widgets;
	}
	
	add_filter('mkdf_core_filter_register_widgets', 'wanderers_mkdf_register_sticky_sidebar_widget');
}