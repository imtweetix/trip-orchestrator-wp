<?php
/*
Plugin Name: Mikado Core
Description: Plugin that adds all post types needed by our theme
Author: Mikado Themes
Version: 1.3
*/

require_once 'load.php';

if ( ! function_exists( 'mkd_core_activation' ) ) {
	/**
	 * Triggers when plugin is activated. It calls flush_rewrite_rules
	 * and defines wanderers_mkdf_core_on_activate action
	 */
	function mkd_core_activation() {
		do_action( 'wanderers_mkdf_core_on_activate' );
		
		flush_rewrite_rules();
	}
	
	register_activation_hook( __FILE__, 'mkd_core_activation' );
}

if ( ! function_exists( 'mkd_core_text_domain' ) ) {
	/**
	 * Loads plugin text domain so it can be used in translation
	 */
	function mkd_core_text_domain() {
		load_plugin_textdomain( 'mkdf-core', false, MIKADO_CORE_REL_PATH . '/languages' );
	}
	
	add_action( 'plugins_loaded', 'mkd_core_text_domain' );
}

if ( ! function_exists( 'mkdf_core_version_class' ) ) {
	/**
	 * Adds plugins version class to body
	 *
	 * @param $classes
	 *
	 * @return array
	 */
	function mkdf_core_version_class( $classes ) {
		$classes[] = 'mkdf-core-' . MIKADO_CORE_VERSION;
		
		return $classes;
	}
	
	add_filter( 'body_class', 'mkdf_core_version_class' );
}

if ( ! function_exists( 'mkdf_core_theme_installed' ) ) {
	/**
	 * Checks whether theme is installed or not
	 * @return bool
	 */
	function mkdf_core_theme_installed() {
		return defined( 'MIKADO_ROOT' );
	}
}

if ( ! function_exists( 'mkdf_core_is_woocommerce_installed' ) ) {
	/**
	 * Function that checks if woocommerce is installed
	 * @return bool
	 */
	function mkdf_core_is_woocommerce_installed() {
		return function_exists( 'is_woocommerce' );
	}
}

if ( ! function_exists( 'mkdf_core_is_woocommerce_integration_installed' ) ) {
	//is Mikado Woocommerce Integration installed?
	function mkdf_core_is_woocommerce_integration_installed() {
		return defined( 'MIKADO_WOOCOMMERCE_CHECKOUT_INTEGRATION' );
	}
}

if ( ! function_exists( 'mkdf_core_is_revolution_slider_installed' ) ) {
	function mkdf_core_is_revolution_slider_installed() {
		return class_exists( 'RevSliderFront' );
	}
}

if(!function_exists('mkdf_core_is_wpml_installed')) {
    /**
     * Function that checks if WPML plugin is installed
     * @return bool
     *
     * @version 0.1
     */
    function mkdf_core_is_wpml_installed() {
        return defined('ICL_SITEPRESS_VERSION');
    }
}

if ( ! function_exists( 'mkd_core_theme_menu' ) ) {
	/**
	 * Function that generates admin menu for options page.
	 * It generates one admin page per options page.
	 */
	function mkd_core_theme_menu() {
		if ( mkdf_core_theme_installed() ) {
			
			global $wanderers_mkdf_Framework;
			wanderers_mkdf_init_theme_options();
			
			$page_hook_suffix = add_menu_page(
                esc_html__( 'Mikado Options', 'mkdf-core' ), // The value used to populate the browser's title bar when the menu page is active
                esc_html__( 'Mikado Options', 'mkdf-core' ), // The text of the menu in the administrator's sidebar
                'administrator',                            // What roles are able to access the menu
                'wanderers_mkdf_theme_menu',            // The ID used to bind submenu items to this menu
                array( $wanderers_mkdf_Framework->getSkin(), 'renderOptions' ), // The callback function used to render this menu
                $wanderers_mkdf_Framework->getSkin()->getSkinURI() . '/assets/img/admin-logo-icon.png', // Icon For menu Item
                4                                                                                            // Position
            );
			

			foreach ( $wanderers_mkdf_Framework->mkdOptions->adminPages as $key => $value ) {
				$slug = "";
				
				if ( ! empty( $value->slug ) ) {
					$slug = "_tab" . $value->slug;
				}
				
				$subpage_hook_suffix = add_submenu_page(
					'wanderers_mkdf_theme_menu',
					esc_html__( 'Mikado Options - ', 'mkdf-core' ) . $value->title, // The value used to populate the browser's title bar when the menu page is active
					$value->title,                                                 // The text of the menu in the administrator's sidebar
					'administrator',                                               // What roles are able to access the menu
					'wanderers_mkdf_theme_menu' . $slug,                       // The ID used to bind submenu items to this menu
					array( $wanderers_mkdf_Framework->getSkin(), 'renderOptions' )
				);
				
				add_action( 'admin_print_scripts-' . $subpage_hook_suffix, 'wanderers_mkdf_enqueue_admin_scripts' );
				add_action( 'admin_print_styles-' . $subpage_hook_suffix, 'wanderers_mkdf_enqueue_admin_styles' );
			};
			
			add_action( 'admin_print_scripts-' . $page_hook_suffix, 'wanderers_mkdf_enqueue_admin_scripts' );
			add_action( 'admin_print_styles-' . $page_hook_suffix, 'wanderers_mkdf_enqueue_admin_styles' );
		}
	}
	
	add_action( 'admin_menu', 'mkd_core_theme_menu' );
}

if ( ! function_exists( 'mkdf_core_theme_menu_backup_options' ) ) {
	/**
	 * Function that generates admin menu for options page.
	 * It generates one admin page per options page.
	 */
	function mkdf_core_theme_menu_backup_options() {
		if ( mkdf_core_theme_installed() ) {
			global $wanderers_mkdf_Framework;
			
			$slug             = "_backup_options";
			$page_hook_suffix = add_submenu_page(
				'wanderers_mkdf_theme_menu',
				esc_html__( 'Mikado Options - Backup Options', 'mkdf-core' ), // The value used to populate the browser's title bar when the menu page is active
				esc_html__( 'Backup Options', 'mkdf-core' ),                // The text of the menu in the administrator's sidebar
				'administrator',                                             // What roles are able to access the menu
				'wanderers_mkdf_theme_menu' . $slug,                     // The ID used to bind submenu items to this menu
				array( $wanderers_mkdf_Framework->getSkin(), 'renderBackupOptions' )
			);
			
			add_action( 'admin_print_scripts-' . $page_hook_suffix, 'wanderers_mkdf_enqueue_admin_scripts' );
			add_action( 'admin_print_styles-' . $page_hook_suffix, 'wanderers_mkdf_enqueue_admin_styles' );
		}
	}
	
	add_action( 'admin_menu', 'mkdf_core_theme_menu_backup_options' );
}

if ( ! function_exists( 'mkdf_core_theme_admin_bar_menu_options' ) ) {
	/**
	 * Add a link to the WP Toolbar
	 */
	function mkdf_core_theme_admin_bar_menu_options( $wp_admin_bar ) {
		$args = array(
			'id'    => 'wanderers-admin-bar-options',
			'title' => sprintf( '<span class="ab-icon dashicons-before dashicons-admin-generic"></span> %s', esc_html__( 'Mikado Options', 'mkdf-core' ) ),
			'href'  => esc_url( admin_url('admin.php?page=wanderers_mkdf_theme_menu') )
		);
		
		$wp_admin_bar->add_node( $args );
	}
	
	add_action( 'admin_bar_menu', 'mkdf_core_theme_admin_bar_menu_options', 999 );
}

if(!function_exists('mkdf_core_theme_setup')) {

    function mkdf_core_theme_setup() {

        add_filter('widget_text', 'do_shortcode');

    }

    add_action('plugins_loaded', 'mkdf_core_theme_setup');
}