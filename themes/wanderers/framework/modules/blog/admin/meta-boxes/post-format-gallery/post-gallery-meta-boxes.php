<?php

if ( ! function_exists( 'wanderers_mkdf_map_post_gallery_meta' ) ) {
	
	function wanderers_mkdf_map_post_gallery_meta() {
		$gallery_post_format_meta_box = wanderers_mkdf_create_meta_box(
			array(
				'scope' => array( 'post' ),
				'title' => esc_html__( 'Gallery Post Format', 'wanderers' ),
				'name'  => 'post_format_gallery_meta'
			)
		);
		
		wanderers_mkdf_add_multiple_images_field(
			array(
				'name'        => 'mkdf_post_gallery_images_meta',
				'label'       => esc_html__( 'Gallery Images', 'wanderers' ),
				'description' => esc_html__( 'Choose your gallery images', 'wanderers' ),
				'parent'      => $gallery_post_format_meta_box,
			)
		);
	}
	
	add_action( 'wanderers_mkdf_meta_boxes_map', 'wanderers_mkdf_map_post_gallery_meta', 21 );
}
