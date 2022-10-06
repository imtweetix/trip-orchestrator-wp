<?php

if ( ! function_exists( 'wanderers_mkdf_centered_title_type_options_meta_boxes' ) ) {
	function wanderers_mkdf_centered_title_type_options_meta_boxes( $show_title_area_meta_container ) {
		
		wanderers_mkdf_create_meta_box_field(
			array(
				'name'        => 'mkdf_subtitle_side_padding_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Subtitle Side Padding', 'wanderers' ),
				'description' => esc_html__( 'Set left/right padding for subtitle area', 'wanderers' ),
				'parent'      => $show_title_area_meta_container,
				'args'        => array(
					'col_width' => 2,
					'suffix'    => 'px or %'
				)
			)
		);
	}
	
	add_action( 'wanderers_mkdf_additional_title_area_meta_boxes', 'wanderers_mkdf_centered_title_type_options_meta_boxes', 5 );
}