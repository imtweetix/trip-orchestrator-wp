<?php

if ( ! function_exists( 'wanderers_mkdf_logo_options_map' ) ) {
	function wanderers_mkdf_logo_options_map() {
		
		wanderers_mkdf_add_admin_page(
			array(
				'slug'  => '_logo_page',
				'title' => esc_html__( 'Logo', 'wanderers' ),
				'icon'  => 'fa fa-coffee'
			)
		);
		
		$panel_logo = wanderers_mkdf_add_admin_panel(
			array(
				'page'  => '_logo_page',
				'name'  => 'panel_logo',
				'title' => esc_html__( 'Logo', 'wanderers' )
			)
		);
		
		wanderers_mkdf_add_admin_field(
			array(
				'parent'        => $panel_logo,
				'type'          => 'yesno',
				'name'          => 'hide_logo',
				'default_value' => 'no',
				'label'         => esc_html__( 'Hide Logo', 'wanderers' ),
				'description'   => esc_html__( 'Enabling this option will hide logo image', 'wanderers' )
			)
		);
		
		$hide_logo_container = wanderers_mkdf_add_admin_container(
			array(
				'parent'          => $panel_logo,
				'name'            => 'hide_logo_container',
				'dependency' => array(
					'hide' => array(
						'hide_logo'  => 'yes'
					)
				)
			)
		);
		
		wanderers_mkdf_add_admin_field(
			array(
				'name'          => 'logo_image',
				'type'          => 'image',
				'default_value' => MIKADO_ASSETS_ROOT . "/img/logo.png",
				'label'         => esc_html__( 'Logo Image - Default', 'wanderers' ),
				'parent'        => $hide_logo_container
			)
		);
		
		wanderers_mkdf_add_admin_field(
			array(
				'name'          => 'logo_image_dark',
				'type'          => 'image',
				'default_value' => MIKADO_ASSETS_ROOT . "/img/logo.png",
				'label'         => esc_html__( 'Logo Image - Dark', 'wanderers' ),
				'parent'        => $hide_logo_container
			)
		);
		
		wanderers_mkdf_add_admin_field(
			array(
				'name'          => 'logo_image_light',
				'type'          => 'image',
				'default_value' => MIKADO_ASSETS_ROOT . "/img/logo_white.png",
				'label'         => esc_html__( 'Logo Image - Light', 'wanderers' ),
				'parent'        => $hide_logo_container
			)
		);
		
		wanderers_mkdf_add_admin_field(
			array(
				'name'          => 'logo_image_sticky',
				'type'          => 'image',
				'default_value' => MIKADO_ASSETS_ROOT . "/img/logo.png",
				'label'         => esc_html__( 'Logo Image - Sticky', 'wanderers' ),
				'parent'        => $hide_logo_container
			)
		);
		
		wanderers_mkdf_add_admin_field(
			array(
				'name'          => 'logo_image_mobile',
				'type'          => 'image',
				'default_value' => MIKADO_ASSETS_ROOT . "/img/logo.png",
				'label'         => esc_html__( 'Logo Image - Mobile', 'wanderers' ),
				'parent'        => $hide_logo_container
			)
		);
	}
	
	add_action( 'wanderers_mkdf_options_map', 'wanderers_mkdf_logo_options_map', 2 );
}