<?php

if ( ! function_exists( 'wanderers_mkdf_map_content_bottom_meta' ) ) {
	function wanderers_mkdf_map_content_bottom_meta() {
		
		$content_bottom_meta_box = wanderers_mkdf_create_meta_box(
			array(
				'scope' => apply_filters( 'wanderers_mkdf_set_scope_for_meta_boxes', array( 'page', 'post' ), 'content_bottom_meta' ),
				'title' => esc_html__( 'Content Bottom', 'wanderers' ),
				'name'  => 'content_bottom_meta'
			)
		);
		
		wanderers_mkdf_create_meta_box_field(
			array(
				'name'          => 'mkdf_enable_content_bottom_area_meta',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__( 'Enable Content Bottom Area', 'wanderers' ),
				'description'   => esc_html__( 'This option will enable Content Bottom area on pages', 'wanderers' ),
				'parent'        => $content_bottom_meta_box,
				'options'       => wanderers_mkdf_get_yes_no_select_array()
			)
		);
		
		$show_content_bottom_meta_container = wanderers_mkdf_add_admin_container(
			array(
				'parent'          => $content_bottom_meta_box,
				'name'            => 'mkdf_show_content_bottom_meta_container',
				'dependency' => array(
					'show' => array(
						'mkdf_enable_content_bottom_area_meta' => 'yes'
					)
				)
			)
		);
		
		wanderers_mkdf_create_meta_box_field(
			array(
				'name'          => 'mkdf_content_bottom_sidebar_custom_display_meta',
				'type'          => 'selectblank',
				'default_value' => '',
				'label'         => esc_html__( 'Sidebar to Display', 'wanderers' ),
				'description'   => esc_html__( 'Choose a content bottom sidebar to display', 'wanderers' ),
				'options'       => wanderers_mkdf_get_custom_sidebars(),
				'parent'        => $show_content_bottom_meta_container,
				'args'          => array(
					'select2' => true
				)
			)
		);
		
		wanderers_mkdf_create_meta_box_field(
			array(
				'type'          => 'select',
				'name'          => 'mkdf_content_bottom_in_grid_meta',
				'default_value' => '',
				'label'         => esc_html__( 'Display in Grid', 'wanderers' ),
				'description'   => esc_html__( 'Enabling this option will place content bottom in grid', 'wanderers' ),
				'options'       => wanderers_mkdf_get_yes_no_select_array(),
				'parent'        => $show_content_bottom_meta_container
			)
		);
		
		wanderers_mkdf_create_meta_box_field(
			array(
				'type'        => 'color',
				'name'        => 'mkdf_content_bottom_background_color_meta',
				'label'       => esc_html__( 'Background Color', 'wanderers' ),
				'description' => esc_html__( 'Choose a background color for content bottom area', 'wanderers' ),
				'parent'      => $show_content_bottom_meta_container
			)
		);
	}
	
	add_action( 'wanderers_mkdf_meta_boxes_map', 'wanderers_mkdf_map_content_bottom_meta', 71 );
}