<?php

if ( ! function_exists( 'wanderers_mkdf_map_post_link_meta' ) ) {
	function wanderers_mkdf_map_post_link_meta() {
		$link_post_format_meta_box = wanderers_mkdf_create_meta_box(
			array(
				'scope' => array( 'post' ),
				'title' => esc_html__( 'Link Post Format', 'wanderers' ),
				'name'  => 'post_format_link_meta'
			)
		);
		
		wanderers_mkdf_create_meta_box_field(
			array(
				'name'        => 'mkdf_post_link_link_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Link', 'wanderers' ),
				'description' => esc_html__( 'Enter link', 'wanderers' ),
				'parent'      => $link_post_format_meta_box
			)
		);

        wanderers_mkdf_create_meta_box_field(
            array(
                'name'        => 'mkdf_post_skin',
                'type'        => 'select',
                'label'       => esc_html__( 'Link Skin', 'wanderers' ),
                'description' => esc_html__( 'Choose Link skin', 'wanderers' ),
                'default'     => 'mkdf-post-dark-skin',
                'options'       => array(
                    'mkdf-post-dark-skin'  => esc_html__('Dark Skin', 'wanderers'),
                    'mkdf-post-light-skin' => esc_html__('Light Skin', 'wanderers')
                ),
                'parent'      => $link_post_format_meta_box
            )
        );
	}
	
	add_action( 'wanderers_mkdf_meta_boxes_map', 'wanderers_mkdf_map_post_link_meta', 24 );
}