<?php

if ( ! function_exists( 'wanderers_mkdf_register_header_minimal_type' ) ) {
	/**
	 * This function is used to register header type class for header factory file
	 */
	function wanderers_mkdf_register_header_minimal_type( $header_types ) {
		$header_type = array(
			'header-minimal' => 'WanderersMkdf\Modules\Header\Types\HeaderMinimal'
		);
		
		$header_types = array_merge( $header_types, $header_type );
		
		return $header_types;
	}
}

if ( ! function_exists( 'wanderers_mkdf_init_register_header_minimal_type' ) ) {
	/**
	 * This function is used to wait header-function.php file to init header object and then to init hook registration function above
	 */
	function wanderers_mkdf_init_register_header_minimal_type() {
		add_filter( 'wanderers_mkdf_register_header_type_class', 'wanderers_mkdf_register_header_minimal_type' );
	}
	
	add_action( 'wanderers_mkdf_before_header_function_init', 'wanderers_mkdf_init_register_header_minimal_type' );
}

if ( ! function_exists( 'wanderers_mkdf_include_header_minimal_full_screen_menu' ) ) {
	/**
	 * Registers additional menu navigation for theme
	 */
	function wanderers_mkdf_include_header_minimal_full_screen_menu( $menus ) {
		$menus['popup-navigation'] = esc_html__( 'Full Screen Navigation', 'wanderers' );
		
		return $menus;
	}
	
	if ( wanderers_mkdf_check_is_header_type_enabled( 'header-minimal' ) ) {
		add_filter( 'wanderers_mkdf_register_headers_menu', 'wanderers_mkdf_include_header_minimal_full_screen_menu' );
	}
}

if ( ! function_exists( 'wanderers_mkdf_register_header_minimal_full_screen_menu_widgets' ) ) {
	/**
	 * Registers additional widget areas for this header type
	 */
	function wanderers_mkdf_register_header_minimal_full_screen_menu_widgets() {
		register_sidebar(
			array(
				'id'            => 'fullscreen_menu_above',
				'name'          => esc_html__( 'Fullscreen Menu Top', 'wanderers' ),
				'description'   => esc_html__( 'This widget area is rendered above full screen menu', 'wanderers' ),
				'before_widget' => '<div class="%2$s mkdf-fullscreen-menu-above-widget">',
				'after_widget'  => '</div>',
				'before_title'  => '<h5 class="mkdf-widget-title">',
				'after_title'   => '</h5>'
			)
		);
		
		register_sidebar(
			array(
				'id'            => 'fullscreen_menu_below',
				'name'          => esc_html__( 'Fullscreen Menu Bottom', 'wanderers' ),
				'description'   => esc_html__( 'This widget area is rendered below full screen menu', 'wanderers' ),
				'before_widget' => '<div class="%2$s mkdf-fullscreen-menu-below-widget">',
				'after_widget'  => '</div>',
				'before_title'  => '<h5 class="mkdf-widget-title">',
				'after_title'   => '</h5>'
			)
		);
	}
	
	if ( wanderers_mkdf_check_is_header_type_enabled( 'header-minimal' ) ) {
		add_action( 'widgets_init', 'wanderers_mkdf_register_header_minimal_full_screen_menu_widgets' );
	}
}