<?php

if ( ! function_exists( 'wanderers_mkdf_map_footer_meta' ) ) {
	function wanderers_mkdf_map_footer_meta() {
		
		$footer_meta_box = wanderers_mkdf_create_meta_box(
			array(
				'scope' => apply_filters( 'wanderers_mkdf_set_scope_for_meta_boxes', array( 'page', 'post' ), 'footer_meta' ),
				'title' => esc_html__( 'Footer', 'wanderers' ),
				'name'  => 'footer_meta'
			)
		);
		
		wanderers_mkdf_create_meta_box_field(
			array(
				'name'          => 'mkdf_disable_footer_meta',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__( 'Disable Footer for this Page', 'wanderers' ),
				'description'   => esc_html__( 'Enabling this option will hide footer on this page', 'wanderers' ),
				'options'       => wanderers_mkdf_get_yes_no_select_array(),
				'parent'        => $footer_meta_box
			)
		);
		
		$show_footer_meta_container = wanderers_mkdf_add_admin_container(
			array(
				'name'       => 'mkdf_show_footer_meta_container',
				'parent'     => $footer_meta_box,
				'dependency' => array(
					'hide' => array(
						'mkdf_disable_footer_meta' => 'yes'
					)
				)
			)
		);
		
			wanderers_mkdf_create_meta_box_field(
				array(
					'name'          => 'mkdf_show_footer_top_meta',
					'type'          => 'select',
					'default_value' => '',
					'label'         => esc_html__( 'Show Footer Top', 'wanderers' ),
					'description'   => esc_html__( 'Enabling this option will show Footer Top area', 'wanderers' ),
					'options'       => wanderers_mkdf_get_yes_no_select_array(),
					'parent'        => $show_footer_meta_container
				)
			);
			
			wanderers_mkdf_create_meta_box_field(
				array(
					'name'          => 'mkdf_show_footer_bottom_meta',
					'type'          => 'select',
					'default_value' => '',
					'label'         => esc_html__( 'Show Footer Bottom', 'wanderers' ),
					'description'   => esc_html__( 'Enabling this option will show Footer Bottom area', 'wanderers' ),
					'options'       => wanderers_mkdf_get_yes_no_select_array(),
					'parent'        => $show_footer_meta_container
				)
			);
	}
	
	add_action( 'wanderers_mkdf_meta_boxes_map', 'wanderers_mkdf_map_footer_meta', 70 );
}