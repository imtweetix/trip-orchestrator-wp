<?php

foreach ( glob( MIKADO_FRAMEWORK_MODULES_ROOT_DIR . '/blog/admin/meta-boxes/*/*.php' ) as $meta_box_load ) {
	include_once $meta_box_load;
}

if ( ! function_exists( 'wanderers_mkdf_map_blog_meta' ) ) {
	function wanderers_mkdf_map_blog_meta() {
		$mkd_blog_categories = array();
		$categories           = get_categories();
		foreach ( $categories as $category ) {
			$mkd_blog_categories[ $category->slug ] = $category->name;
		}
		
		$blog_meta_box = wanderers_mkdf_create_meta_box(
			array(
				'scope' => array( 'page' ),
				'title' => esc_html__( 'Blog', 'wanderers' ),
				'name'  => 'blog_meta'
			)
		);
		
		wanderers_mkdf_create_meta_box_field(
			array(
				'name'        => 'mkdf_blog_category_meta',
				'type'        => 'selectblank',
				'label'       => esc_html__( 'Blog Category', 'wanderers' ),
				'description' => esc_html__( 'Choose category of posts to display (leave empty to display all categories)', 'wanderers' ),
				'parent'      => $blog_meta_box,
				'options'     => $mkd_blog_categories
			)
		);
		
		wanderers_mkdf_create_meta_box_field(
			array(
				'name'        => 'mkdf_show_posts_per_page_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Number of Posts', 'wanderers' ),
				'description' => esc_html__( 'Enter the number of posts to display', 'wanderers' ),
				'parent'      => $blog_meta_box,
				'options'     => $mkd_blog_categories,
				'args'        => array(
					'col_width' => 3
				)
			)
		);
		
		wanderers_mkdf_create_meta_box_field(
			array(
				'name'        => 'mkdf_blog_masonry_layout_meta',
				'type'        => 'select',
				'label'       => esc_html__( 'Masonry - Layout', 'wanderers' ),
				'description' => esc_html__( 'Set masonry layout. Default is in grid.', 'wanderers' ),
				'parent'      => $blog_meta_box,
				'options'     => array(
					''           => esc_html__( 'Default', 'wanderers' ),
					'in-grid'    => esc_html__( 'In Grid', 'wanderers' ),
					'full-width' => esc_html__( 'Full Width', 'wanderers' )
				)
			)
		);
		
		wanderers_mkdf_create_meta_box_field(
			array(
				'name'        => 'mkdf_blog_masonry_number_of_columns_meta',
				'type'        => 'select',
				'label'       => esc_html__( 'Masonry - Number of Columns', 'wanderers' ),
				'description' => esc_html__( 'Set number of columns for your masonry blog lists', 'wanderers' ),
				'parent'      => $blog_meta_box,
				'options'     => array(
					''      => esc_html__( 'Default', 'wanderers' ),
					'two'   => esc_html__( '2 Columns', 'wanderers' ),
					'three' => esc_html__( '3 Columns', 'wanderers' ),
					'four'  => esc_html__( '4 Columns', 'wanderers' ),
					'five'  => esc_html__( '5 Columns', 'wanderers' )
				)
			)
		);
		
		wanderers_mkdf_create_meta_box_field(
			array(
				'name'        => 'mkdf_blog_masonry_space_between_items_meta',
				'type'        => 'select',
				'label'       => esc_html__( 'Masonry - Space Between Items', 'wanderers' ),
				'description' => esc_html__( 'Set space size between posts for your masonry blog lists', 'wanderers' ),
				'options'     => wanderers_mkdf_get_space_between_items_array( true ),
				'parent'      => $blog_meta_box
			)
		);
		
		wanderers_mkdf_create_meta_box_field(
			array(
				'name'          => 'mkdf_blog_list_featured_image_proportion_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Masonry - Featured Image Proportion', 'wanderers' ),
				'description'   => esc_html__( 'Choose type of proportions you want to use for featured images on masonry blog lists', 'wanderers' ),
				'parent'        => $blog_meta_box,
				'default_value' => '',
				'options'       => array(
					''         => esc_html__( 'Default', 'wanderers' ),
					'fixed'    => esc_html__( 'Fixed', 'wanderers' ),
					'original' => esc_html__( 'Original', 'wanderers' )
				)
			)
		);
		
		wanderers_mkdf_create_meta_box_field(
			array(
				'name'          => 'mkdf_blog_pagination_type_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Pagination Type', 'wanderers' ),
				'description'   => esc_html__( 'Choose a pagination layout for Blog Lists', 'wanderers' ),
				'parent'        => $blog_meta_box,
				'default_value' => '',
				'options'       => array(
					''                => esc_html__( 'Default', 'wanderers' ),
					'standard'        => esc_html__( 'Standard', 'wanderers' ),
					'load-more'       => esc_html__( 'Load More', 'wanderers' ),
					'infinite-scroll' => esc_html__( 'Infinite Scroll', 'wanderers' ),
					'no-pagination'   => esc_html__( 'No Pagination', 'wanderers' )
				)
			)
		);
		
		wanderers_mkdf_create_meta_box_field(
			array(
				'type'          => 'text',
				'name'          => 'mkdf_number_of_chars_meta',
				'default_value' => '',
				'label'         => esc_html__( 'Number of Words in Excerpt', 'wanderers' ),
				'description'   => esc_html__( 'Enter a number of words in excerpt (article summary). Default value is 40', 'wanderers' ),
				'parent'        => $blog_meta_box,
				'args'          => array(
					'col_width' => 3
				)
			)
		);
	}
	
	add_action( 'wanderers_mkdf_meta_boxes_map', 'wanderers_mkdf_map_blog_meta', 30 );
}