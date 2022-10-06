<?php

if ( ! function_exists( 'wanderers_mkdf_map_post_audio_meta' ) ) {
	function wanderers_mkdf_map_post_audio_meta() {
		$audio_post_format_meta_box = wanderers_mkdf_create_meta_box(
			array(
				'scope' => array( 'post' ),
				'title' => esc_html__( 'Audio Post Format', 'wanderers' ),
				'name'  => 'post_format_audio_meta'
			)
		);
		
		wanderers_mkdf_create_meta_box_field(
			array(
				'name'          => 'mkdf_audio_type_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Audio Type', 'wanderers' ),
				'description'   => esc_html__( 'Choose audio type', 'wanderers' ),
				'parent'        => $audio_post_format_meta_box,
				'default_value' => 'social_networks',
				'options'       => array(
					'social_networks' => esc_html__( 'Audio Service', 'wanderers' ),
					'self'            => esc_html__( 'Self Hosted', 'wanderers' )
				)
			)
		);
		
		$mkdf_audio_embedded_container = wanderers_mkdf_add_admin_container(
			array(
				'parent' => $audio_post_format_meta_box,
				'name'   => 'mkdf_audio_embedded_container'
			)
		);
		
		wanderers_mkdf_create_meta_box_field(
			array(
				'name'        => 'mkdf_post_audio_link_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Audio URL', 'wanderers' ),
				'description' => esc_html__( 'Enter audio URL', 'wanderers' ),
				'parent'      => $mkdf_audio_embedded_container,
				'dependency' => array(
					'show' => array(
						'mkdf_audio_type_meta' => 'social_networks'
					)
				)
			)
		);
		
		wanderers_mkdf_create_meta_box_field(
			array(
				'name'        => 'mkdf_post_audio_custom_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Audio Link', 'wanderers' ),
				'description' => esc_html__( 'Enter audio link', 'wanderers' ),
				'parent'      => $mkdf_audio_embedded_container,
				'dependency' => array(
					'show' => array(
						'mkdf_audio_type_meta' => 'self'
					)
				)
			)
		);
	}
	
	add_action( 'wanderers_mkdf_meta_boxes_map', 'wanderers_mkdf_map_post_audio_meta', 23 );
}