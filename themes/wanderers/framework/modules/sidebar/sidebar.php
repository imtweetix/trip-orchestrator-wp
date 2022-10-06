<?php

if ( ! function_exists( 'wanderers_mkdf_register_sidebars' ) ) {
	/**
	 * Function that registers theme's sidebars
	 */
	function wanderers_mkdf_register_sidebars() {
		
		register_sidebar(
			array(
				'id'            => 'sidebar',
				'name'          => esc_html__( 'Sidebar', 'wanderers' ),
				'description'   => esc_html__( 'Default Sidebar', 'wanderers' ),
				'before_widget' => '<div id="%1$s" class="widget %2$s">',
				'after_widget'  => '</div>',
				'before_title'  => '<div class="mkdf-widget-title-holder"><h4 class="mkdf-widget-title">',
				'after_title'   => '</h4></div>'
			)
		);
	}
	
	add_action( 'widgets_init', 'wanderers_mkdf_register_sidebars', 1 );
}

if ( ! function_exists( 'wanderers_mkdf_add_support_custom_sidebar' ) ) {
	/**
	 * Function that adds theme support for custom sidebars. It also creates WanderersMkdfSidebar object
	 */
	function wanderers_mkdf_add_support_custom_sidebar() {
		add_theme_support( 'WanderersMkdfSidebar' );
		
		if ( get_theme_support( 'WanderersMkdfSidebar' ) ) {
			new WanderersMkdfSidebar();
		}
	}
	
	add_action( 'after_setup_theme', 'wanderers_mkdf_add_support_custom_sidebar' );
}