<?php

if ( ! function_exists( 'wanderers_mkdf_disable_wpml_css' ) ) {
	function wanderers_mkdf_disable_wpml_css() {
		define( 'ICL_DONT_LOAD_LANGUAGE_SELECTOR_CSS', true );
	}
	
	add_action( 'after_setup_theme', 'wanderers_mkdf_disable_wpml_css' );
}