<?php

if ( ! function_exists( 'wanderers_mkdf_woocommerce_options_map' ) ) {
	
	/**
	 * Add Woocommerce options page
	 */
	function wanderers_mkdf_woocommerce_options_map() {
		
		wanderers_mkdf_add_admin_page(
			array(
				'slug'  => '_woocommerce_page',
				'title' => esc_html__( 'Woocommerce', 'wanderers' ),
				'icon'  => 'fa fa-shopping-cart'
			)
		);
		
		/**
		 * Product List Settings
		 */
		$panel_product_list = wanderers_mkdf_add_admin_panel(
			array(
				'page'  => '_woocommerce_page',
				'name'  => 'panel_product_list',
				'title' => esc_html__( 'Product List', 'wanderers' )
			)
		);
		
		wanderers_mkdf_add_admin_field(
			array(
				'type'          => 'select',
				'name'          => 'mkdf_woo_product_list_columns',
				'label'         => esc_html__( 'Product List Columns', 'wanderers' ),
				'default_value' => 'mkdf-woocommerce-columns-4',
				'description'   => esc_html__( 'Choose number of columns for main shop page', 'wanderers' ),
				'options'       => array(
					'mkdf-woocommerce-columns-3' => esc_html__( '3 Columns', 'wanderers' ),
					'mkdf-woocommerce-columns-4' => esc_html__( '4 Columns', 'wanderers' )
				),
				'parent'        => $panel_product_list,
			)
		);
		
		wanderers_mkdf_add_admin_field(
			array(
				'type'          => 'select',
				'name'          => 'mkdf_woo_product_list_columns_space',
				'label'         => esc_html__( 'Space Between Items', 'wanderers' ),
				'description'   => esc_html__( 'Select space between items for product listing and related products on single product', 'wanderers' ),
				'default_value' => 'small',
				'options'       => wanderers_mkdf_get_space_between_items_array(),
				'parent'        => $panel_product_list,
			)
		);
		
		wanderers_mkdf_add_admin_field(
			array(
				'type'          => 'text',
				'name'          => 'mkdf_woo_products_per_page',
				'label'         => esc_html__( 'Number of products per page', 'wanderers' ),
				'description'   => esc_html__( 'Set number of products on shop page', 'wanderers' ),
				'parent'        => $panel_product_list,
				'args'          => array(
					'col_width' => 3
				)
			)
		);
		
		wanderers_mkdf_add_admin_field(
			array(
				'type'          => 'select',
				'name'          => 'mkdf_products_list_title_tag',
				'label'         => esc_html__( 'Products Title Tag', 'wanderers' ),
				'default_value' => 'h5',
				'options'       => wanderers_mkdf_get_title_tag(),
				'parent'        => $panel_product_list,
			)
		);
		
		/**
		 * Single Product Settings
		 */
		$panel_single_product = wanderers_mkdf_add_admin_panel(
			array(
				'page'  => '_woocommerce_page',
				'name'  => 'panel_single_product',
				'title' => esc_html__( 'Single Product', 'wanderers' )
			)
		);
		
		wanderers_mkdf_add_admin_field(
			array(
				'type'          => 'select',
				'name'          => 'show_title_area_woo',
				'default_value' => '',
				'label'         => esc_html__( 'Show Title Area', 'wanderers' ),
				'description'   => esc_html__( 'Enabling this option will show title area on single post pages', 'wanderers' ),
				'parent'        => $panel_single_product,
				'options'       => wanderers_mkdf_get_yes_no_select_array(),
				'args'          => array(
					'col_width' => 3
				)
			)
		);
		
		wanderers_mkdf_add_admin_field(
			array(
				'type'          => 'select',
				'name'          => 'mkdf_single_product_title_tag',
				'default_value' => 'h3',
				'label'         => esc_html__( 'Single Product Title Tag', 'wanderers' ),
				'options'       => wanderers_mkdf_get_title_tag(),
				'parent'        => $panel_single_product,
			)
		);
		
		wanderers_mkdf_add_admin_field(
			array(
				'type'          => 'select',
				'name'          => 'woo_number_of_thumb_images',
				'default_value' => '4',
				'label'         => esc_html__( 'Number of Thumbnail Images per Row', 'wanderers' ),
				'options'       => array(
					'4' => esc_html__( 'Four', 'wanderers' ),
					'3' => esc_html__( 'Three', 'wanderers' ),
					'2' => esc_html__( 'Two', 'wanderers' )
				),
				'parent'        => $panel_single_product
			)
		);
		
		wanderers_mkdf_add_admin_field(
			array(
				'type'          => 'select',
				'name'          => 'woo_set_thumb_images_position',
				'default_value' => 'on-left-side',
				'label'         => esc_html__( 'Set Thumbnail Images Position', 'wanderers' ),
				'options'       => array(
					'below-image'  => esc_html__( 'Below Featured Image', 'wanderers' ),
					'on-left-side' => esc_html__( 'On The Left Side Of Featured Image', 'wanderers' )
				),
				'parent'        => $panel_single_product
			)
		);
		
		wanderers_mkdf_add_admin_field(
			array(
				'type'          => 'select',
				'name'          => 'woo_enable_single_product_zoom_image',
				'default_value' => 'no',
				'label'         => esc_html__( 'Enable Zoom Maginfier', 'wanderers' ),
				'description'   => esc_html__( 'Enabling this option will show magnifier image on featured image hover', 'wanderers' ),
				'parent'        => $panel_single_product,
				'options'       => wanderers_mkdf_get_yes_no_select_array( false ),
				'args'          => array(
					'col_width' => 3
				)
			)
		);
		
		wanderers_mkdf_add_admin_field(
			array(
				'type'          => 'select',
				'name'          => 'woo_set_single_images_behavior',
				'default_value' => 'pretty-photo',
				'label'         => esc_html__( 'Set Images Behavior', 'wanderers' ),
				'options'       => array(
					'pretty-photo' => esc_html__( 'Pretty Photo Lightbox', 'wanderers' ),
					'photo-swipe'  => esc_html__( 'Photo Swipe Lightbox', 'wanderers' )
				),
				'parent'        => $panel_single_product
			)
		);
		
		wanderers_mkdf_add_admin_field(
			array(
				'type'          => 'select',
				'name'          => 'mkdf_woo_related_products_columns',
				'label'         => esc_html__( 'Related Products Columns', 'wanderers' ),
				'default_value' => 'mkdf-woocommerce-columns-4',
				'description'   => esc_html__( 'Choose number of columns for related products on single product page', 'wanderers' ),
				'options'       => array(
					'mkdf-woocommerce-columns-3' => esc_html__( '3 Columns', 'wanderers' ),
					'mkdf-woocommerce-columns-4' => esc_html__( '4 Columns', 'wanderers' )
				),
				'parent'        => $panel_single_product,
			)
		);
	}
	
	add_action( 'wanderers_mkdf_options_map', 'wanderers_mkdf_woocommerce_options_map', 21 );
}