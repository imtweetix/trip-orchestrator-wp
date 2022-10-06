<?php

if ( ! function_exists( 'wanderers_mkdf_register_woocommerce_dropdown_cart_widget' ) ) {
	/**
	 * Function that register image gallery widget
	 */
	function wanderers_mkdf_register_woocommerce_dropdown_cart_widget( $widgets ) {
		$widgets[] = 'WanderersMkdfWoocommerceDropdownCart';
		
		return $widgets;
	}
	
	add_filter( 'mkdf_core_filter_register_widgets', 'wanderers_mkdf_register_woocommerce_dropdown_cart_widget' );
}