<?php

if ( ! function_exists( 'wanderers_mkdf_search_opener_icon_size' ) ) {
	function wanderers_mkdf_search_opener_icon_size() {
		$icon_size = wanderers_mkdf_options()->getOptionValue( 'header_search_icon_size' );
		
		if ( ! empty( $icon_size ) ) {
			echo wanderers_mkdf_dynamic_css( '.mkdf-search-opener', array(
				'font-size' => wanderers_mkdf_filter_px( $icon_size ) . 'px'
			) );
		}
	}
	
	add_action( 'wanderers_mkdf_style_dynamic', 'wanderers_mkdf_search_opener_icon_size' );
}

if ( ! function_exists( 'wanderers_mkdf_search_opener_icon_colors' ) ) {
	function wanderers_mkdf_search_opener_icon_colors() {
		$icon_color       = wanderers_mkdf_options()->getOptionValue( 'header_search_icon_color' );
		$icon_hover_color = wanderers_mkdf_options()->getOptionValue( 'header_search_icon_hover_color' );
		
		if ( ! empty( $icon_color ) ) {
			echo wanderers_mkdf_dynamic_css( '.mkdf-search-opener', array(
				'color' => $icon_color
			) );
		}
		
		if ( ! empty( $icon_hover_color ) ) {
			echo wanderers_mkdf_dynamic_css( '.mkdf-search-opener:hover', array(
				'color' => $icon_hover_color
			) );
		}
	}
	
	add_action( 'wanderers_mkdf_style_dynamic', 'wanderers_mkdf_search_opener_icon_colors' );
}

if ( ! function_exists( 'wanderers_mkdf_search_opener_text_styles' ) ) {
	function wanderers_mkdf_search_opener_text_styles() {
		$item_styles = wanderers_mkdf_get_typography_styles( 'search_icon_text' );
		
		$item_selector = array(
			'.mkdf-search-icon-text'
		);
		
		echo wanderers_mkdf_dynamic_css( $item_selector, $item_styles );
		
		$text_hover_color = wanderers_mkdf_options()->getOptionValue( 'search_icon_text_color_hover' );
		
		if ( ! empty( $text_hover_color ) ) {
			echo wanderers_mkdf_dynamic_css( '.mkdf-search-opener:hover .mkdf-search-icon-text', array(
				'color' => $text_hover_color
			) );
		}
	}
	
	add_action( 'wanderers_mkdf_style_dynamic', 'wanderers_mkdf_search_opener_text_styles' );
}