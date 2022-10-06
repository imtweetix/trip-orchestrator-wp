<?php

if ( ! function_exists( 'wanderers_mkdf_page_options_map' ) ) {
	function wanderers_mkdf_page_options_map() {
		
		wanderers_mkdf_add_admin_page(
			array(
				'slug'  => '_page_page',
				'title' => esc_html__( 'Page', 'wanderers' ),
				'icon'  => 'fa fa-file-text-o'
			)
		);
		
		/***************** Page Layout - begin **********************/
		
		$panel_sidebar = wanderers_mkdf_add_admin_panel(
			array(
				'page'  => '_page_page',
				'name'  => 'panel_sidebar',
				'title' => esc_html__( 'Page Style', 'wanderers' )
			)
		);
		
		wanderers_mkdf_add_admin_field(
			array(
				'name'          => 'page_show_comments',
				'type'          => 'yesno',
				'label'         => esc_html__( 'Show Comments', 'wanderers' ),
				'description'   => esc_html__( 'Enabling this option will show comments on your page', 'wanderers' ),
				'default_value' => 'yes',
				'parent'        => $panel_sidebar
			)
		);
		
		/***************** Page Layout - end **********************/
		
		/***************** Content Layout - begin **********************/
		
		$panel_content = wanderers_mkdf_add_admin_panel(
			array(
				'page'  => '_page_page',
				'name'  => 'panel_content',
				'title' => esc_html__( 'Content Style', 'wanderers' )
			)
		);
		
		wanderers_mkdf_add_admin_field(
			array(
				'type'          => 'text',
				'name'          => 'content_top_padding',
				'default_value' => '',
				'label'         => esc_html__( 'Content Top Padding for Template in Full Width', 'wanderers' ),
				'description'   => esc_html__( 'Enter top padding for content area for templates in full width. If you set this value then it\'s important to set also Content top padding for mobile header value', 'wanderers' ),
				'args'          => array(
					'suffix'    => 'px',
					'col_width' => 3
				),
				'parent'        => $panel_content
			)
		);
		
		wanderers_mkdf_add_admin_field(
			array(
				'type'          => 'text',
				'name'          => 'content_top_padding_in_grid',
				'default_value' => '',
				'label'         => esc_html__( 'Content Top Padding for Templates in Grid', 'wanderers' ),
				'description'   => esc_html__( 'Enter top padding for content area for Templates in grid. If you set this value then it\'s important to set also Content top padding for mobile header value', 'wanderers' ),
				'args'          => array(
					'suffix'    => 'px',
					'col_width' => 3
				),
				'parent'        => $panel_content
			)
		);
		
		wanderers_mkdf_add_admin_field(
			array(
				'type'          => 'text',
				'name'          => 'content_top_padding_mobile',
				'default_value' => '',
				'label'         => esc_html__( 'Content Top Padding for Mobile Header', 'wanderers' ),
				'description'   => esc_html__( 'Enter top padding for content area for Mobile Header', 'wanderers' ),
				'args'          => array(
					'suffix'    => 'px',
					'col_width' => 3
				),
				'parent'        => $panel_content
			)
		);

		wanderers_mkdf_add_admin_field(
			array(
				'type'          => 'yesno',
				'name'          => 'content_bottom_padding_disable',
				'default_value' => 'no',
				'label'         => esc_html__( 'Disable Content Bottom Padding', 'wanderers' ),
				'description'   => esc_html__( 'This option will disable default content padding for content area.', 'wanderers' ),
				'args'          => array(
					'suffix'    => 'px',
					'col_width' => 3
				),
				'parent'        => $panel_content
			)
		);
		
		/***************** Content Layout - end **********************/
		
		/***************** Additional Page Layout - start *****************/
		
		do_action( 'wanderers_mkdf_additional_page_options_map' );
		
		/***************** Additional Page Layout - end *****************/
	}
	
	add_action( 'wanderers_mkdf_options_map', 'wanderers_mkdf_page_options_map', 8 );
}