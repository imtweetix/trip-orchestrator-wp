<?php

if ( ! function_exists( 'wanderers_mkdf_map_woocommerce_meta' ) ) {
	function wanderers_mkdf_map_woocommerce_meta() {
		
		$woocommerce_meta_box = wanderers_mkdf_create_meta_box(
			array(
				'scope' => array( 'product' ),
				'title' => esc_html__( 'Product Meta', 'wanderers' ),
				'name'  => 'woo_product_meta'
			)
		);
		
		wanderers_mkdf_create_meta_box_field(
			array(
				'name'        => 'mkdf_product_featured_image_size',
				'type'        => 'select',
				'label'       => esc_html__( 'Dimensions for Product List Shortcode', 'wanderers' ),
				'description' => esc_html__( 'Choose image layout when it appears in Mikado Product List - Masonry layout shortcode', 'wanderers' ),
				'options'     => array(
					''                                   => esc_html__( 'Default', 'wanderers' ),
					'mkdf-woo-image-small'              => esc_html__( 'Small', 'wanderers' ),
					'mkdf-woo-image-large-width'        => esc_html__( 'Large Width', 'wanderers' ),
					'mkdf-woo-image-large-height'       => esc_html__( 'Large Height', 'wanderers' ),
					'mkdf-woo-image-large-width-height' => esc_html__( 'Large Width Height', 'wanderers' )
				),
				'parent'      => $woocommerce_meta_box
			)
		);
		
		wanderers_mkdf_create_meta_box_field(
			array(
				'name'          => 'mkdf_show_title_area_woo_meta',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__( 'Show Title Area', 'wanderers' ),
				'description'   => esc_html__( 'Disabling this option will turn off page title area', 'wanderers' ),
				'options'       => wanderers_mkdf_get_yes_no_select_array(),
				'parent'        => $woocommerce_meta_box
			)
		);
		
		wanderers_mkdf_create_meta_box_field(
			array(
				'name'          => 'mkdf_show_new_sign_woo_meta',
				'type'          => 'yesno',
				'default_value' => 'no',
				'label'         => esc_html__( 'Show New Sign', 'wanderers' ),
				'description'   => esc_html__( 'Enabling this option will show new sign mark on product', 'wanderers' ),
				'parent'        => $woocommerce_meta_box
			)
		);
	}
	
	add_action( 'wanderers_mkdf_meta_boxes_map', 'wanderers_mkdf_map_woocommerce_meta', 99 );
}