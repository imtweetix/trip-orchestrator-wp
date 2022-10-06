<?php

if ( ! function_exists( 'wanderers_mkdf_sidebar_options_map' ) ) {
	function wanderers_mkdf_sidebar_options_map() {
		
		wanderers_mkdf_add_admin_page(
			array(
				'slug'  => '_sidebar_page',
				'title' => esc_html__( 'Sidebar Area', 'wanderers' ),
				'icon'  => 'fa fa-indent'
			)
		);
		
		$sidebar_panel = wanderers_mkdf_add_admin_panel(
			array(
				'title' => esc_html__( 'Sidebar Area', 'wanderers' ),
				'name'  => 'sidebar',
				'page'  => '_sidebar_page'
			)
		);
		
		wanderers_mkdf_add_admin_field( array(
			'name'          => 'sidebar_layout',
			'type'          => 'select',
			'label'         => esc_html__( 'Sidebar Layout', 'wanderers' ),
			'description'   => esc_html__( 'Choose a sidebar layout for pages', 'wanderers' ),
			'parent'        => $sidebar_panel,
			'default_value' => 'no-sidebar',
            'options'       => wanderers_mkdf_get_custom_sidebars_options()
		) );
		
		$wanderers_custom_sidebars = wanderers_mkdf_get_custom_sidebars();
		if ( count( $wanderers_custom_sidebars ) > 0 ) {
			wanderers_mkdf_add_admin_field( array(
				'name'        => 'custom_sidebar_area',
				'type'        => 'selectblank',
				'label'       => esc_html__( 'Sidebar to Display', 'wanderers' ),
				'description' => esc_html__( 'Choose a sidebar to display on pages. Default sidebar is "Sidebar"', 'wanderers' ),
				'parent'      => $sidebar_panel,
				'options'     => $wanderers_custom_sidebars,
				'args'        => array(
					'select2' => true
				)
			) );
		}
	}
	
	add_action( 'wanderers_mkdf_options_map', 'wanderers_mkdf_sidebar_options_map', 9 );
}