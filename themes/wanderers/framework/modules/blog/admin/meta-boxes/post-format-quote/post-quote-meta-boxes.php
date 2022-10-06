<?php

if ( ! function_exists( 'wanderers_mkdf_map_post_quote_meta' ) ) {
	function wanderers_mkdf_map_post_quote_meta() {
		$quote_post_format_meta_box = wanderers_mkdf_create_meta_box(
			array(
				'scope' => array( 'post' ),
				'title' => esc_html__( 'Quote Post Format', 'wanderers' ),
				'name'  => 'post_format_quote_meta'
			)
		);

		wanderers_mkdf_create_meta_box_field(
			array(
				'name'        => 'mkdf_post_quote_text_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Quote Text', 'wanderers' ),
				'description' => esc_html__( 'Enter Quote text', 'wanderers' ),
				'parent'      => $quote_post_format_meta_box
			)
		);

		wanderers_mkdf_create_meta_box_field(
			array(
				'name'        => 'mkdf_post_quote_author_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Quote Author', 'wanderers' ),
				'description' => esc_html__( 'Enter Quote author', 'wanderers' ),
				'parent'      => $quote_post_format_meta_box
			)
		);

        wanderers_mkdf_create_meta_box_field(
            array(
                'name'        => 'mkdf_post_skin',
                'type'        => 'select',
                'label'       => esc_html__( 'Quote Skin', 'wanderers' ),
                'description' => esc_html__( 'Choose Quote skin', 'wanderers' ),
                'default'     => 'mkdf-post-dark-skin',
                'options'       => array(
                    'mkdf-post-dark-skin'  => esc_html__('Dark Skin', 'wanderers'),
                    'mkdf-post-light-skin' => esc_html__('Light Skin', 'wanderers')
                ),
                'parent'      => $quote_post_format_meta_box
            )
        );
	}

	add_action( 'wanderers_mkdf_meta_boxes_map', 'wanderers_mkdf_map_post_quote_meta', 25 );
}