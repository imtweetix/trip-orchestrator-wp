<?php

if ( ! function_exists( 'wanderers_mkdf_sticky_header_meta_boxes_options_map' ) ) {
	function wanderers_mkdf_sticky_header_meta_boxes_options_map( $header_meta_box ) {
		
		$sticky_amount_container = wanderers_mkdf_add_admin_container(
			array(
				'parent'          => $header_meta_box,
				'name'            => 'sticky_amount_container_meta_container',
				'dependency' => array(
					'hide' => array(
						'mkdf_header_behaviour_meta'  => array( '', 'no-behavior','fixed-on-scroll','sticky-header-on-scroll-up' )
					)
				)
			)
		);
		
		wanderers_mkdf_create_meta_box_field(
			array(
				'name'        => 'mkdf_scroll_amount_for_sticky_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Scroll amount for sticky header appearance', 'wanderers' ),
				'description' => esc_html__( 'Define scroll amount for sticky header appearance', 'wanderers' ),
				'parent'      => $sticky_amount_container,
				'args'        => array(
					'col_width' => 2,
					'suffix'    => 'px'
				)
			)
		);
	}
	
	add_action( 'wanderers_mkdf_additional_header_area_meta_boxes_map', 'wanderers_mkdf_sticky_header_meta_boxes_options_map', 10, 1 );
}