<?php

if ( ! function_exists( 'wanderers_mkdf_get_hide_dep_for_header_standard_options' ) ) {
	function wanderers_mkdf_get_hide_dep_for_header_standard_options() {
		$hide_dep_options = apply_filters( 'wanderers_mkdf_header_standard_hide_global_option', $hide_dep_options = array() );
		
		return $hide_dep_options;
	}
}

if ( ! function_exists( 'wanderers_mkdf_header_standard_map' ) ) {
	function wanderers_mkdf_header_standard_map( $parent ) {
		$hide_dep_options = wanderers_mkdf_get_hide_dep_for_header_standard_options();
		
		wanderers_mkdf_add_admin_field(
			array(
				'parent'          => $parent,
				'type'            => 'select',
				'name'            => 'set_menu_area_position',
				'default_value'   => 'right',
				'label'           => esc_html__( 'Choose Menu Area Position', 'wanderers' ),
				'description'     => esc_html__( 'Select menu area position in your header', 'wanderers' ),
				'options'         => array(
					'right'  => esc_html__( 'Right', 'wanderers' ),
					'left'   => esc_html__( 'Left', 'wanderers' ),
					'center' => esc_html__( 'Center', 'wanderers' )
				),
				'dependency' => array(
					'hide' => array(
						'header_options'  => $hide_dep_options
					)
				)
			)
		);
	}
	
	add_action( 'wanderers_mkdf_additional_header_menu_area_options_map', 'wanderers_mkdf_header_standard_map' );
}