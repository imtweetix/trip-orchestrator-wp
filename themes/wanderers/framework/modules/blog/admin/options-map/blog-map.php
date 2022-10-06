<?php

if ( ! function_exists( 'wanderers_mkdf_get_blog_list_types_options' ) ) {
	function wanderers_mkdf_get_blog_list_types_options() {
		$blog_list_type_options = apply_filters( 'wanderers_mkdf_blog_list_type_global_option', $blog_list_type_options = array() );
		
		return $blog_list_type_options;
	}
}

if ( ! function_exists( 'wanderers_mkdf_blog_options_map' ) ) {
	function wanderers_mkdf_blog_options_map() {
		$blog_list_type_options = wanderers_mkdf_get_blog_list_types_options();
		
		wanderers_mkdf_add_admin_page(
			array(
				'slug'  => '_blog_page',
				'title' => esc_html__( 'Blog', 'wanderers' ),
				'icon'  => 'fa fa-files-o'
			)
		);
		
		/**
		 * Blog Lists
		 */
		$panel_blog_lists = wanderers_mkdf_add_admin_panel(
			array(
				'page'  => '_blog_page',
				'name'  => 'panel_blog_lists',
				'title' => esc_html__( 'Blog Lists', 'wanderers' )
			)
		);
		
		wanderers_mkdf_add_admin_field(
			array(
				'name'          => 'blog_list_type',
				'type'          => 'select',
				'label'         => esc_html__( 'Blog Layout for Archive Pages', 'wanderers' ),
				'description'   => esc_html__( 'Choose a default blog layout for archived blog post lists', 'wanderers' ),
				'default_value' => 'standard',
				'parent'        => $panel_blog_lists,
				'options'       => $blog_list_type_options
			)
		);
		
		wanderers_mkdf_add_admin_field(
			array(
				'name'          => 'archive_sidebar_layout',
				'type'          => 'select',
				'label'         => esc_html__( 'Sidebar Layout for Archive Pages', 'wanderers' ),
				'description'   => esc_html__( 'Choose a sidebar layout for archived blog post lists', 'wanderers' ),
				'default_value' => '',
				'parent'        => $panel_blog_lists,
                'options'       => wanderers_mkdf_get_custom_sidebars_options(),
			)
		);
		
		$wanderers_custom_sidebars = wanderers_mkdf_get_custom_sidebars();
		if ( count( $wanderers_custom_sidebars ) > 0 ) {
			wanderers_mkdf_add_admin_field(
				array(
					'name'        => 'archive_custom_sidebar_area',
					'type'        => 'selectblank',
					'label'       => esc_html__( 'Sidebar to Display for Archive Pages', 'wanderers' ),
					'description' => esc_html__( 'Choose a sidebar to display on archived blog post lists. Default sidebar is "Sidebar Page"', 'wanderers' ),
					'parent'      => $panel_blog_lists,
					'options'     => wanderers_mkdf_get_custom_sidebars(),
					'args'        => array(
						'select2' => true
					)
				)
			);
		}
		
		wanderers_mkdf_add_admin_field(
			array(
				'name'          => 'blog_masonry_layout',
				'type'          => 'select',
				'label'         => esc_html__( 'Masonry - Layout', 'wanderers' ),
				'default_value' => 'in-grid',
				'description'   => esc_html__( 'Set masonry layout. Default is in grid.', 'wanderers' ),
				'parent'        => $panel_blog_lists,
				'options'       => array(
					'in-grid'    => esc_html__( 'In Grid', 'wanderers' ),
					'full-width' => esc_html__( 'Full Width', 'wanderers' )
				)
			)
		);
		
		wanderers_mkdf_add_admin_field(
			array(
				'name'          => 'blog_masonry_number_of_columns',
				'type'          => 'select',
				'label'         => esc_html__( 'Masonry - Number of Columns', 'wanderers' ),
				'default_value' => 'three',
				'description'   => esc_html__( 'Set number of columns for your masonry blog lists. Default value is 4 columns', 'wanderers' ),
				'parent'        => $panel_blog_lists,
				'options'       => array(
					'two'   => esc_html__( '2 Columns', 'wanderers' ),
					'three' => esc_html__( '3 Columns', 'wanderers' ),
					'four'  => esc_html__( '4 Columns', 'wanderers' ),
					'five'  => esc_html__( '5 Columns', 'wanderers' )
				)
			)
		);
		
		wanderers_mkdf_add_admin_field(
			array(
				'name'          => 'blog_masonry_space_between_items',
				'type'          => 'select',
				'label'         => esc_html__( 'Masonry - Space Between Items', 'wanderers' ),
				'description'   => esc_html__( 'Set space size between posts for your masonry blog lists. Default value is normal', 'wanderers' ),
				'default_value' => 'normal',
				'options'       => wanderers_mkdf_get_space_between_items_array(),
				'parent'        => $panel_blog_lists
			)
		);
		
		wanderers_mkdf_add_admin_field(
			array(
				'name'          => 'blog_list_featured_image_proportion',
				'type'          => 'select',
				'label'         => esc_html__( 'Masonry - Featured Image Proportion', 'wanderers' ),
				'default_value' => 'fixed',
				'description'   => esc_html__( 'Choose type of proportions you want to use for featured images on masonry blog lists', 'wanderers' ),
				'parent'        => $panel_blog_lists,
				'options'       => array(
					'fixed'    => esc_html__( 'Fixed', 'wanderers' ),
					'original' => esc_html__( 'Original', 'wanderers' )
				)
			)
		);
		
		wanderers_mkdf_add_admin_field(
			array(
				'name'          => 'blog_pagination_type',
				'type'          => 'select',
				'label'         => esc_html__( 'Pagination Type', 'wanderers' ),
				'description'   => esc_html__( 'Choose a pagination layout for Blog Lists', 'wanderers' ),
				'parent'        => $panel_blog_lists,
				'default_value' => 'standard',
				'options'       => array(
					'standard'        => esc_html__( 'Standard', 'wanderers' ),
					'load-more'       => esc_html__( 'Load More', 'wanderers' ),
					'infinite-scroll' => esc_html__( 'Infinite Scroll', 'wanderers' ),
					'no-pagination'   => esc_html__( 'No Pagination', 'wanderers' )
				)
			)
		);

		wanderers_mkdf_add_admin_field(
			array(
				'name'          => 'blog_tags',
				'type'          => 'select',
				'label'         => esc_html__( 'Enable Tags', 'wanderers' ),
				'description'   => esc_html__( 'Enabling this option will display tags on Blog Lists', 'wanderers' ),
				'parent'        => $panel_blog_lists,
				'default_value' => 'yes',
				'options'       => array(
					'yes'     => esc_html__( 'Yes', 'wanderers' ),
					'no'      => esc_html__( 'No', 'wanderers' ),
				)
			)
		);
		
		wanderers_mkdf_add_admin_field(
			array(
				'type'          => 'text',
				'name'          => 'number_of_chars',
				'default_value' => '40',
				'label'         => esc_html__( 'Number of Words in Excerpt', 'wanderers' ),
				'description'   => esc_html__( 'Enter a number of words in excerpt (article summary). Default value is 40', 'wanderers' ),
				'parent'        => $panel_blog_lists,
				'args'          => array(
					'col_width' => 3
				)
			)
		);
		
		/**
		 * Blog Single
		 */
		$panel_blog_single = wanderers_mkdf_add_admin_panel(
			array(
				'page'  => '_blog_page',
				'name'  => 'panel_blog_single',
				'title' => esc_html__( 'Blog Single', 'wanderers' )
			)
		);
		
		wanderers_mkdf_add_admin_field(
			array(
				'name'          => 'blog_single_sidebar_layout',
				'type'          => 'select',
				'label'         => esc_html__( 'Sidebar Layout', 'wanderers' ),
				'description'   => esc_html__( 'Choose a sidebar layout for Blog Single pages', 'wanderers' ),
				'default_value' => '',
				'parent'        => $panel_blog_single,
                'options'       => wanderers_mkdf_get_custom_sidebars_options()
			)
		);
		
		if ( count( $wanderers_custom_sidebars ) > 0 ) {
			wanderers_mkdf_add_admin_field(
				array(
					'name'        => 'blog_single_custom_sidebar_area',
					'type'        => 'selectblank',
					'label'       => esc_html__( 'Sidebar to Display', 'wanderers' ),
					'description' => esc_html__( 'Choose a sidebar to display on Blog Single pages. Default sidebar is "Sidebar"', 'wanderers' ),
					'parent'      => $panel_blog_single,
					'options'     => wanderers_mkdf_get_custom_sidebars(),
					'args'        => array(
						'select2' => true
					)
				)
			);
		}
		
		wanderers_mkdf_add_admin_field(
			array(
				'type'          => 'select',
				'name'          => 'show_title_area_blog',
				'default_value' => '',
				'label'         => esc_html__( 'Show Title Area', 'wanderers' ),
				'description'   => esc_html__( 'Enabling this option will show title area on single post pages', 'wanderers' ),
				'parent'        => $panel_blog_single,
				'options'       => wanderers_mkdf_get_yes_no_select_array(),
				'args'          => array(
					'col_width' => 3
				)
			)
		);
		
		wanderers_mkdf_add_admin_field(
			array(
				'name'          => 'blog_single_title_in_title_area',
				'type'          => 'yesno',
				'label'         => esc_html__( 'Show Post Title in Title Area', 'wanderers' ),
				'description'   => esc_html__( 'Enabling this option will show post title in title area on single post pages', 'wanderers' ),
				'parent'        => $panel_blog_single,
				'default_value' => 'no'
			)
		);
		
		wanderers_mkdf_add_admin_field(
			array(
				'name'          => 'blog_single_related_posts',
				'type'          => 'yesno',
				'label'         => esc_html__( 'Show Related Posts', 'wanderers' ),
				'description'   => esc_html__( 'Enabling this option will show related posts on single post pages', 'wanderers' ),
				'parent'        => $panel_blog_single,
				'default_value' => 'yes'
			)
		);
		
		wanderers_mkdf_add_admin_field(
			array(
				'name'          => 'blog_single_comments',
				'type'          => 'yesno',
				'label'         => esc_html__( 'Show Comments Form', 'wanderers' ),
				'description'   => esc_html__( 'Enabling this option will show comments form on single post pages', 'wanderers' ),
				'parent'        => $panel_blog_single,
				'default_value' => 'yes'
			)
		);
		
		wanderers_mkdf_add_admin_field(
			array(
				'type'          => 'yesno',
				'name'          => 'blog_single_navigation',
				'default_value' => 'no',
				'label'         => esc_html__( 'Enable Prev/Next Single Post Navigation Links', 'wanderers' ),
				'description'   => esc_html__( 'Enable navigation links through the blog posts (left and right arrows will appear)', 'wanderers' ),
				'parent'        => $panel_blog_single
			)
		);
		
		$blog_single_navigation_container = wanderers_mkdf_add_admin_container(
			array(
				'name'            => 'mkdf_blog_single_navigation_container',
				'parent'          => $panel_blog_single,
				'dependency' => array(
					'show' => array(
						'blog_single_navigation' => 'yes'
					)
				)
			)
		);
		
		wanderers_mkdf_add_admin_field(
			array(
				'type'          => 'yesno',
				'name'          => 'blog_navigation_through_same_category',
				'default_value' => 'no',
				'label'         => esc_html__( 'Enable Navigation Only in Current Category', 'wanderers' ),
				'description'   => esc_html__( 'Limit your navigation only through current category', 'wanderers' ),
				'parent'        => $blog_single_navigation_container,
				'args'          => array(
					'col_width' => 3
				)
			)
		);
		
		wanderers_mkdf_add_admin_field(
			array(
				'type'          => 'yesno',
				'name'          => 'blog_author_info',
				'default_value' => 'yes',
				'label'         => esc_html__( 'Show Author Info Box', 'wanderers' ),
				'description'   => esc_html__( 'Enabling this option will display author name and descriptions on single post pages', 'wanderers' ),
				'parent'        => $panel_blog_single
			)
		);
		
		$blog_single_author_info_container = wanderers_mkdf_add_admin_container(
			array(
				'name'            => 'mkdf_blog_single_author_info_container',
				'parent'          => $panel_blog_single,
				'dependency' => array(
					'show' => array(
						'blog_author_info' => 'yes'
					)
				)
			)
		);
		
		wanderers_mkdf_add_admin_field(
			array(
				'type'          => 'yesno',
				'name'          => 'blog_author_info_email',
				'default_value' => 'no',
				'label'         => esc_html__( 'Show Author Email', 'wanderers' ),
				'description'   => esc_html__( 'Enabling this option will show author email', 'wanderers' ),
				'parent'        => $blog_single_author_info_container,
				'args'          => array(
					'col_width' => 3
				)
			)
		);
		
		wanderers_mkdf_add_admin_field(
			array(
				'type'          => 'yesno',
				'name'          => 'blog_single_author_social',
				'default_value' => 'yes',
				'label'         => esc_html__( 'Show Author Social Icons', 'wanderers' ),
				'description'   => esc_html__( 'Enabling this option will show author social icons on single post pages', 'wanderers' ),
				'parent'        => $blog_single_author_info_container,
				'args'          => array(
					'col_width' => 3
				)
			)
		);
		
		do_action( 'wanderers_mkdf_blog_single_options_map', $panel_blog_single );
	}
	
	add_action( 'wanderers_mkdf_options_map', 'wanderers_mkdf_blog_options_map', 13 );
}