<?php

if ( ! function_exists( 'wanderers_mkdf_get_hide_dep_for_header_standard_meta_boxes' ) ) {
	function wanderers_mkdf_get_hide_dep_for_header_standard_meta_boxes() {
		$hide_dep_options = apply_filters( 'wanderers_mkdf_header_standard_hide_meta_boxes', $hide_dep_options = array() );
		
		return $hide_dep_options;
	}
}

if ( ! function_exists( 'wanderers_mkdf_header_standard_meta_map' ) ) {
	function wanderers_mkdf_header_standard_meta_map( $parent ) {
		$hide_dep_options = wanderers_mkdf_get_hide_dep_for_header_standard_meta_boxes();
		
		wanderers_mkdf_create_meta_box_field(
			array(
				'parent'          => $parent,
				'type'            => 'select',
				'name'            => 'mkdf_set_menu_area_position_meta',
				'default_value'   => '',
				'label'           => esc_html__( 'Choose Menu Area Position', 'wanderers' ),
				'description'     => esc_html__( 'Select menu area position in your header', 'wanderers' ),
				'options'         => array(
					''       => esc_html__( 'Default', 'wanderers' ),
					'left'   => esc_html__( 'Left', 'wanderers' ),
					'right'  => esc_html__( 'Right', 'wanderers' ),
					'center' => esc_html__( 'Center', 'wanderers' )
				),
				'dependency' => array(
					'hide' => array(
						'mkdf_header_type_meta'  => $hide_dep_options
					)
				)
			)
		);
	}
	
	add_action( 'wanderers_mkdf_additional_header_area_meta_boxes_map', 'wanderers_mkdf_header_standard_meta_map' );
}