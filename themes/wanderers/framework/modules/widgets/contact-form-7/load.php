<?php

if ( wanderers_mkdf_contact_form_7_installed() ) {
	include_once MIKADO_FRAMEWORK_MODULES_ROOT_DIR . '/widgets/contact-form-7/contact-form-7.php';
	
	add_filter( 'mkdf_core_filter_register_widgets', 'wanderers_mkdf_register_cf7_widget' );
}

if ( ! function_exists( 'wanderers_mkdf_register_cf7_widget' ) ) {
	/**
	 * Function that register cf7 widget
	 */
	function wanderers_mkdf_register_cf7_widget( $widgets ) {
		$widgets[] = 'WanderersMkdfContactForm7Widget';
		
		return $widgets;
	}
}