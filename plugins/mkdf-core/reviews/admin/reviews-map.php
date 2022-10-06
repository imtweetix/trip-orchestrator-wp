<?php

if ( ! function_exists( 'mkdf_core_reviews_map' ) ) {
	function mkdf_core_reviews_map() {
		
		$reviews_panel = wanderers_mkdf_add_admin_panel(
			array(
				'title' => esc_html__( 'Reviews', 'mkdf-core' ),
				'name'  => 'panel_reviews',
				'page'  => '_page_page'
			)
		);
		
		wanderers_mkdf_add_admin_field(
			array(
				'parent'      => $reviews_panel,
				'type'        => 'text',
				'name'        => 'reviews_section_title',
				'label'       => esc_html__( 'Reviews Section Title', 'mkdf-core' ),
				'description' => esc_html__( 'Enter title that you want to show before average rating for each room', 'mkdf-core' ),
			)
		);
		
		wanderers_mkdf_add_admin_field(
			array(
				'parent'      => $reviews_panel,
				'type'        => 'textarea',
				'name'        => 'reviews_section_subtitle',
				'label'       => esc_html__( 'Reviews Section Subtitle', 'mkdf-core' ),
				'description' => esc_html__( 'Enter subtitle that you want to show before average rating for each room', 'mkdf-core' ),
			)
		);
		
		do_action( 'mkdf_hotel_room_action_single_fields' );
	}
	
	add_action( 'wanderers_mkdf_additional_page_options_map', 'mkdf_core_reviews_map', 75 ); //one after elements
}