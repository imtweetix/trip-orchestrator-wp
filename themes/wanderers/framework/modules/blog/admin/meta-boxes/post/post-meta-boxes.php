<?php

/*** Post Settings ***/

if ( ! function_exists( 'wanderers_mkdf_map_post_meta' ) ) {
	function wanderers_mkdf_map_post_meta() {
		
		$post_meta_box = wanderers_mkdf_create_meta_box(
			array(
				'scope' => array( 'post' ),
				'title' => esc_html__( 'Post', 'wanderers' ),
				'name'  => 'post-meta'
			)
		);
		
		wanderers_mkdf_create_meta_box_field(
			array(
				'name'          => 'mkdf_blog_single_sidebar_layout_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Sidebar Layout', 'wanderers' ),
				'description'   => esc_html__( 'Choose a sidebar layout for Blog single page', 'wanderers' ),
				'default_value' => '',
				'parent'        => $post_meta_box,
                'options'       => wanderers_mkdf_get_custom_sidebars_options( true )
			)
		);
		
		$wanderers_custom_sidebars = wanderers_mkdf_get_custom_sidebars();
		if ( count( $wanderers_custom_sidebars ) > 0 ) {
			wanderers_mkdf_create_meta_box_field( array(
				'name'        => 'mkdf_blog_single_custom_sidebar_area_meta',
				'type'        => 'selectblank',
				'label'       => esc_html__( 'Sidebar to Display', 'wanderers' ),
				'description' => esc_html__( 'Choose a sidebar to display on Blog single page. Default sidebar is "Sidebar"', 'wanderers' ),
				'parent'      => $post_meta_box,
				'options'     => wanderers_mkdf_get_custom_sidebars(),
				'args' => array(
					'select2' => true
				)
			) );
		}
		
		wanderers_mkdf_create_meta_box_field(
			array(
				'name'        => 'mkdf_blog_list_featured_image_meta',
				'type'        => 'image',
				'label'       => esc_html__( 'Blog List Image', 'wanderers' ),
				'description' => esc_html__( 'Choose an Image for displaying in blog list. If not uploaded, featured image will be shown.', 'wanderers' ),
				'parent'      => $post_meta_box
			)
		);
		
		wanderers_mkdf_create_meta_box_field(
			array(
				'name'          => 'mkdf_blog_masonry_gallery_fixed_dimensions_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Dimensions for Fixed Proportion', 'wanderers' ),
				'description'   => esc_html__( 'Choose image layout when it appears in Masonry lists in fixed proportion', 'wanderers' ),
				'default_value' => 'default',
				'parent'        => $post_meta_box,
				'options'       => array(
					'default'            => esc_html__( 'Default', 'wanderers' ),
					'large-width'        => esc_html__( 'Large Width', 'wanderers' ),
					'large-height'       => esc_html__( 'Large Height', 'wanderers' ),
					'large-width-height' => esc_html__( 'Large Width/Height', 'wanderers' )
				)
			)
		);
		
		wanderers_mkdf_create_meta_box_field(
			array(
				'name'          => 'mkdf_blog_masonry_gallery_original_dimensions_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Dimensions for Original Proportion', 'wanderers' ),
				'description'   => esc_html__( 'Choose image layout when it appears in Masonry lists in original proportion', 'wanderers' ),
				'default_value' => 'default',
				'parent'        => $post_meta_box,
				'options'       => array(
					'default'     => esc_html__( 'Default', 'wanderers' ),
					'large-width' => esc_html__( 'Large Width', 'wanderers' )
				)
			)
		);
		
		wanderers_mkdf_create_meta_box_field(
			array(
				'name'          => 'mkdf_show_title_area_blog_meta',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__( 'Show Title Area', 'wanderers' ),
				'description'   => esc_html__( 'Enabling this option will show title area on your single post page', 'wanderers' ),
				'parent'        => $post_meta_box,
				'options'       => wanderers_mkdf_get_yes_no_select_array()
			)
		);

		do_action('wanderers_mkdf_blog_post_meta', $post_meta_box);
	}
	
	add_action( 'wanderers_mkdf_meta_boxes_map', 'wanderers_mkdf_map_post_meta', 20 );
}
