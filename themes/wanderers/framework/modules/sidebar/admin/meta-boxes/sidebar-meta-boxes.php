<?php

if ( ! function_exists( 'wanderers_mkdf_map_sidebar_meta' ) ) {
	function wanderers_mkdf_map_sidebar_meta() {
		$mkdf_sidebar_meta_box = wanderers_mkdf_create_meta_box(
			array(
				'scope' => apply_filters( 'wanderers_mkdf_set_scope_for_meta_boxes', array( 'page' ), 'sidebar_meta' ),
				'title' => esc_html__( 'Sidebar', 'wanderers' ),
				'name'  => 'sidebar_meta'
			)
		);
		
		wanderers_mkdf_create_meta_box_field(
			array(
				'name'        => 'mkdf_sidebar_layout_meta',
				'type'        => 'select',
				'label'       => esc_html__( 'Sidebar Layout', 'wanderers' ),
				'description' => esc_html__( 'Choose the sidebar layout', 'wanderers' ),
				'parent'      => $mkdf_sidebar_meta_box,
                'options'       => wanderers_mkdf_get_custom_sidebars_options( true )
			)
		);
		
		$mkdf_custom_sidebars = wanderers_mkdf_get_custom_sidebars();
		if ( count( $mkdf_custom_sidebars ) > 0 ) {
			wanderers_mkdf_create_meta_box_field(
				array(
					'name'        => 'mkdf_custom_sidebar_area_meta',
					'type'        => 'selectblank',
					'label'       => esc_html__( 'Choose Widget Area in Sidebar', 'wanderers' ),
					'description' => esc_html__( 'Choose Custom Widget area to display in Sidebar"', 'wanderers' ),
					'parent'      => $mkdf_sidebar_meta_box,
					'options'     => $mkdf_custom_sidebars,
					'args'        => array(
						'select2' => true
					)
				)
			);
		}
	}
	
	add_action( 'wanderers_mkdf_meta_boxes_map', 'wanderers_mkdf_map_sidebar_meta', 31 );
}