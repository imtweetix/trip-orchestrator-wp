<?php

if ( ! function_exists( 'wanderers_mkdf_breadcrumbs_title_area_typography_style' ) ) {
	function wanderers_mkdf_breadcrumbs_title_area_typography_style() {
		
		$item_styles = wanderers_mkdf_get_typography_styles( 'page_breadcrumb' );
		
		$item_selector = array(
			'.mkdf-title-holder .mkdf-title-wrapper .mkdf-breadcrumbs'
		);
		
		echo wanderers_mkdf_dynamic_css( $item_selector, $item_styles );
		
		
		$breadcrumb_hover_color = wanderers_mkdf_options()->getOptionValue( 'page_breadcrumb_hovercolor' );
		
		$breadcrumb_hover_styles = array();
		if ( ! empty( $breadcrumb_hover_color ) ) {
			$breadcrumb_hover_styles['color'] = $breadcrumb_hover_color;
		}
		
		$breadcrumb_hover_selector = array(
			'.mkdf-title-holder .mkdf-title-wrapper .mkdf-breadcrumbs a:hover'
		);
		
		echo wanderers_mkdf_dynamic_css( $breadcrumb_hover_selector, $breadcrumb_hover_styles );
	}
	
	add_action( 'wanderers_mkdf_style_dynamic', 'wanderers_mkdf_breadcrumbs_title_area_typography_style' );
}