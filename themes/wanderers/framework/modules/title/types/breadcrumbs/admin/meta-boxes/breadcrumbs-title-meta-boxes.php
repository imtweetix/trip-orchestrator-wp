<?php

if ( ! function_exists( 'wanderers_mkdf_breadcrumbs_title_type_options_meta_boxes' ) ) {
	function wanderers_mkdf_breadcrumbs_title_type_options_meta_boxes( $show_title_area_meta_container ) {
		
		wanderers_mkdf_create_meta_box_field(
			array(
				'name'        => 'mkdf_breadcrumbs_color_meta',
				'type'        => 'color',
				'label'       => esc_html__( 'Breadcrumbs Color', 'wanderers' ),
				'description' => esc_html__( 'Choose a color for breadcrumbs text', 'wanderers' ),
				'parent'      => $show_title_area_meta_container
			)
		);
	}
	
	add_action( 'wanderers_mkdf_additional_title_area_meta_boxes', 'wanderers_mkdf_breadcrumbs_title_type_options_meta_boxes' );
}