<?php

if ( ! function_exists( 'wanderers_mkdf_logo_meta_box_map' ) ) {
	function wanderers_mkdf_logo_meta_box_map() {
		
		$logo_meta_box = wanderers_mkdf_create_meta_box(
			array(
				'scope' => apply_filters( 'wanderers_mkdf_set_scope_for_meta_boxes', array( 'page', 'post' ), 'logo_meta' ),
				'title' => esc_html__( 'Logo', 'wanderers' ),
				'name'  => 'logo_meta'
			)
		);
		
		wanderers_mkdf_create_meta_box_field(
			array(
				'name'        => 'mkdf_logo_image_meta',
				'type'        => 'image',
				'label'       => esc_html__( 'Logo Image - Default', 'wanderers' ),
				'description' => esc_html__( 'Choose a default logo image to display ', 'wanderers' ),
				'parent'      => $logo_meta_box
			)
		);
		
		wanderers_mkdf_create_meta_box_field(
			array(
				'name'        => 'mkdf_logo_image_dark_meta',
				'type'        => 'image',
				'label'       => esc_html__( 'Logo Image - Dark', 'wanderers' ),
				'description' => esc_html__( 'Choose a default logo image to display ', 'wanderers' ),
				'parent'      => $logo_meta_box
			)
		);
		
		wanderers_mkdf_create_meta_box_field(
			array(
				'name'        => 'mkdf_logo_image_light_meta',
				'type'        => 'image',
				'label'       => esc_html__( 'Logo Image - Light', 'wanderers' ),
				'description' => esc_html__( 'Choose a default logo image to display ', 'wanderers' ),
				'parent'      => $logo_meta_box
			)
		);
		
		wanderers_mkdf_create_meta_box_field(
			array(
				'name'        => 'mkdf_logo_image_sticky_meta',
				'type'        => 'image',
				'label'       => esc_html__( 'Logo Image - Sticky', 'wanderers' ),
				'description' => esc_html__( 'Choose a default logo image to display ', 'wanderers' ),
				'parent'      => $logo_meta_box
			)
		);
		
		wanderers_mkdf_create_meta_box_field(
			array(
				'name'        => 'mkdf_logo_image_mobile_meta',
				'type'        => 'image',
				'label'       => esc_html__( 'Logo Image - Mobile', 'wanderers' ),
				'description' => esc_html__( 'Choose a default logo image to display ', 'wanderers' ),
				'parent'      => $logo_meta_box
			)
		);
	}
	
	add_action( 'wanderers_mkdf_meta_boxes_map', 'wanderers_mkdf_logo_meta_box_map', 47 );
}