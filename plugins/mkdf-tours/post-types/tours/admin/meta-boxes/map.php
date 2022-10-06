<?php
if ( ! function_exists( 'mkdf_tours_info_section_map' ) ) {
	
	function mkdf_tours_info_section_map() {
		$destinations = mkdf_tours_get_destinations( true );
		
		$info_section_meta_box = wanderers_mkdf_create_meta_box(
			array(
				'scope' => array( 'tour-item' ),
				'title' => esc_html__( 'Overview Section', 'mkdf-tours' ),
				'name'  => 'tours_info_section_meta'
			)
		);
		
		wanderers_mkdf_create_meta_box_field(
			array(
				'name'          => 'mkdf_tours_show_info_section',
				'type'          => 'yesno',
				'default_value' => 'yes',
				'label'         => esc_html__( 'Show Overview Section', 'mkdf-tours' ),
				'parent'        => $info_section_meta_box
			)
		);
		
		$info_section_container = wanderers_mkdf_add_admin_container_no_style(
			array(
				'type'       => 'container',
				'name'       => 'info_section_container',
				'parent'     => $info_section_meta_box,
				'dependency' => array(
					'show' => array(
						'mkdf_tours_show_info_section' => 'yes'
					)
				)
			)
		);
		
		wanderers_mkdf_create_meta_box_field(
			array(
				'name'          => 'mkdf_tours_price',
				'type'          => 'text',
				'default_value' => '',
				'label'         => esc_html__( 'Price', 'mkdf-tours' ),
				'parent'        => $info_section_container
			)
		);
		
		wanderers_mkdf_create_meta_box_field(
			array(
				'name'          => 'mkdf_tours_discount_price',
				'type'          => 'text',
				'default_value' => '',
				'label'         => esc_html__( 'Discount Price', 'mkdf-tours' ),
				'parent'        => $info_section_container
			)
		);
		
		wanderers_mkdf_create_meta_box_field(
			array(
				'name'          => 'mkdf_tours_duration',
				'type'          => 'text',
				'default_value' => '',
				'label'         => esc_html__( 'Duration', 'mkdf-tours' ),
				'parent'        => $info_section_container
			)
		);
		
		wanderers_mkdf_create_meta_box_field(
			array(
				'name'          => 'mkdf_tours_destination',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__( 'Destination', 'mkdf-tours' ),
				'options'       => $destinations,
				'parent'        => $info_section_container
			)
		);
		
		wanderers_mkdf_create_meta_box_field(
			array(
				'name'          => 'mkdf_tours_custom_label',
				'type'          => 'text',
				'default_value' => '',
				'label'         => esc_html__( 'Custom Label', 'mkdf-tours' ),
				'description'   => esc_html__( 'Define custom label which will show on tour lists and tour single pages', 'mkdf-tours' ),
				'parent'        => $info_section_container
			)
		);
		
		wanderers_mkdf_create_meta_box_field(
			array(
				'name'          => 'mkdf_tours_info_min_years',
				'type'          => 'text',
				'default_value' => '',
				'label'         => esc_html__( 'Minimum Years Required', 'mkdf-tours' ),
				'parent'        => $info_section_container
			)
		);
		
		wanderers_mkdf_create_meta_box_field(
			array(
				'name'          => 'mkdf_tours_departure',
				'type'          => 'text',
				'default_value' => '',
				'label'         => esc_html__( 'Departure/Return Location', 'mkdf-tours' ),
				'parent'        => $info_section_container
			)
		);
		
		wanderers_mkdf_create_meta_box_field(
			array(
				'name'          => 'mkdf_tours_departure_time',
				'type'          => 'text',
				'default_value' => '',
				'label'         => esc_html__( 'Arrival/Departure Cities', 'mkdf-tours' ),
				'parent'        => $info_section_container
			)
		);
		
		wanderers_mkdf_create_meta_box_field(
			array(
				'name'          => 'mkdf_tours_return_time',
				'type'          => 'text',
				'default_value' => '',
				'label'         => esc_html__( 'Hotels', 'mkdf-tours' ),
				'parent'        => $info_section_container
			)
		);
		
		wanderers_mkdf_create_meta_box_field(
			array(
				'name'          => 'mkdf_tours_dress_code',
				'type'          => 'text',
				'default_value' => '',
				'label'         => esc_html__( 'Dress Code', 'mkdf-tours' ),
				'parent'        => $info_section_container
			)
		);
		
		$masonry_section_container = wanderers_mkdf_add_admin_container(
			array(
				'type'   => 'container',
				'name'   => 'masonry_section_container',
				'parent' => $info_section_meta_box
			)
		);
		
		wanderers_mkdf_add_admin_section_title(
			array(
				'name'   => 'masonry_section_title',
				'parent' => $masonry_section_container,
				'title'  => esc_html__( 'Masonry List Settings', 'mkdf-tours' )
			)
		);
		
		wanderers_mkdf_create_meta_box_field(
			array(
				'name'          => 'mkdf_tours_masonry_dimensions',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__( 'Masonry Dimensions', 'mkdf-tours' ),
				'options'       => array(
					'default'            => esc_html__( 'Default', 'mkdf-tours' ),
					'square'             => esc_html__( 'Square', 'mkdf-tours' ),
					'large-width'        => esc_html__( 'Large Width', 'mkdf-tours' ),
					'large-height'       => esc_html__( 'Large Height', 'mkdf-tours' ),
					'large-width-height' => esc_html__( 'Large Width/Height', 'mkdf-tours' )
				),
				'parent'        => $masonry_section_container
			)
		);
		
		wanderers_mkdf_create_meta_box_field(
			array(
				'name'          => 'mkdf_tours_list_image',
				'type'          => 'image',
				'default_value' => '',
				'label'         => esc_html__( 'List Image', 'mkdf-tours' ),
				'parent'        => $masonry_section_container
			)
		);
	}
	
	add_action( 'wanderers_mkdf_meta_boxes_map', 'mkdf_tours_info_section_map' );
}

if ( ! function_exists( 'mkdf_tours_tour_plan_section_map' ) ) {
	function mkdf_tours_tour_plan_section_map() {
		
		$tour_plan_section_meta_box = wanderers_mkdf_create_meta_box(
			array(
				'scope' => array( 'tour-item' ),
				'title' => esc_html__( 'Day-by-day Program', 'mkdf-tours' ),
				'name'  => 'tours_plan_section_meta'
			)
		);
		
		wanderers_mkdf_create_meta_box_field(
			array(
				'name'          => 'mkdf_tours_show_tour_plan_section',
				'type'          => 'yesno',
				'default_value' => 'yes',
				'label'         => esc_html__( 'Show Day-by-day Program Section', 'mkdf-tours' ),
				'parent'        => $tour_plan_section_meta_box
			)
		);
		
		$tour_plan_section_container = wanderers_mkdf_add_admin_container_no_style(
			array(
				'type'       => 'container',
				'name'       => 'tour_plan_section_container',
				'parent'     => $tour_plan_section_meta_box,
				'dependency' => array(
					'show' => array(
						'mkdf_tours_show_tour_plan_section' => 'yes'
					)
				)
			)
		);
		
		wanderers_mkdf_add_repeater_field(
			array(
				'name'        => 'mkdf_tour_plan_repeater',
				'parent'      => $tour_plan_section_container,
				'button_text' => esc_html__( 'Add new Tour Plan Section', 'mkdf-tours' ),
				'fields'      => array(
					array(
						'type'        => 'text',
						'name'        => 'plan_section_title',
						'label'       => esc_html__( 'Tour Plan Section Title', 'mkdf-tours' ),
						'description' => esc_html__( 'Description', 'mkdf-tours' )
					),
					array(
						'type'        => 'textareahtml',
						'name'        => 'plan_section_description',
						'label'       => esc_html__( 'Tour Plan Section Description', 'mkdf-tours' ),
						'description' => esc_html__( 'Description field', 'mkdf-tours' )
					)
				)
			)
		);
	}
	
	add_action( 'wanderers_mkdf_meta_boxes_map', 'mkdf_tours_tour_plan_section_map' );
}

if ( ! function_exists( 'mkdf_tours_location_section_map' ) ) {
	function mkdf_tours_location_section_map() {
		
		$location_section_meta_box = wanderers_mkdf_create_meta_box(
			array(
				'scope' => array( 'tour-item' ),
				'title' => esc_html__( 'Location Section', 'mkdf-tours' ),
				'name'  => 'location_section_meta'
			)
		);
		
		wanderers_mkdf_create_meta_box_field(
			array(
				'name'          => 'mkdf_tours_show_location_section',
				'type'          => 'yesno',
				'default_value' => 'yes',
				'label'         => esc_html__( 'Show Location Section', 'mkdf-tours' ),
				'parent'        => $location_section_meta_box
			)
		);
		
		$location_section_container = wanderers_mkdf_add_admin_container_no_style(
			array(
				'type'       => 'container',
				'name'       => 'location_section_container',
				'parent'     => $location_section_meta_box,
				'dependency' => array(
					'show' => array(
						'mkdf_tours_show_location_section' => 'yes'
					)
				)
			)
		);
		
		wanderers_mkdf_create_meta_box_field(
			array(
				'name'          => 'mkdf_tours_location_excerpt',
				'type'          => 'text',
				'default_value' => '',
				'label'         => esc_html__( 'Location Excerpt', 'mkdf-tours' ),
				'parent'        => $location_section_container
			)
		);
		
		wanderers_mkdf_create_meta_box_field(
			array(
				'name'          => 'mkdf_tours_location_address1',
				'type'          => 'text',
				'default_value' => '',
				'label'         => esc_html__( 'Address 1', 'mkdf-tours' ),
				'parent'        => $location_section_container
			)
		);
		
		wanderers_mkdf_create_meta_box_field(
			array(
				'name'          => 'mkdf_tours_location_address2',
				'type'          => 'text',
				'default_value' => '',
				'label'         => esc_html__( 'Address 2', 'mkdf-tours' ),
				'parent'        => $location_section_container
			)
		);
		
		wanderers_mkdf_create_meta_box_field(
			array(
				'name'          => 'mkdf_tours_location_address3',
				'type'          => 'text',
				'default_value' => '',
				'label'         => esc_html__( 'Address 3', 'mkdf-tours' ),
				'parent'        => $location_section_container
			)
		);
		
		wanderers_mkdf_create_meta_box_field(
			array(
				'name'          => 'mkdf_tours_location_address4',
				'type'          => 'text',
				'default_value' => '',
				'label'         => esc_html__( 'Address 4', 'mkdf-tours' ),
				'parent'        => $location_section_container
			)
		);
		
		wanderers_mkdf_create_meta_box_field(
			array(
				'name'          => 'mkdf_tours_location_address5',
				'type'          => 'text',
				'default_value' => '',
				'label'         => esc_html__( 'Address 5', 'mkdf-tours' ),
				'parent'        => $location_section_container
			)
		);
		
		wanderers_mkdf_create_meta_box_field(
			array(
				'name'          => 'mkdf_tours_location_content',
				'type'          => 'textareahtml',
				'default_value' => '',
				'label'         => esc_html__( 'Location Content', 'mkdf-tours' ),
				'parent'        => $location_section_container
			)
		);
	}
	
	add_action( 'wanderers_mkdf_meta_boxes_map', 'mkdf_tours_location_section_map' );
}

if ( ! function_exists( 'mkdf_tours_gallery_section_map' ) ) {
	function mkdf_tours_gallery_section_map() {
		
		$gallery_section_meta_box = wanderers_mkdf_create_meta_box(
			array(
				'scope' => array( 'tour-item' ),
				'title' => esc_html__( 'Gallery Section', 'mkdf-tours' ),
				'name'  => 'gallery_section_meta'
			)
		);
		
		wanderers_mkdf_create_meta_box_field(
			array(
				'name'          => 'mkdf_tours_show_gallery_section',
				'type'          => 'yesno',
				'default_value' => 'yes',
				'label'         => esc_html__( 'Show Gallery Section', 'mkdf-tours' ),
				'parent'        => $gallery_section_meta_box
			)
		);
		
		$gallery_section_container = wanderers_mkdf_add_admin_container_no_style(
			array(
				'type'       => 'container',
				'name'       => 'gallery_section_container',
				'parent'     => $gallery_section_meta_box,
				'dependency' => array(
					'show' => array(
						'mkdf_tours_show_gallery_section' => 'yes'
					)
				)
			)
		);
		
		wanderers_mkdf_create_meta_box_field(
			array(
				'name'          => 'mkdf_tours_gallery_excerpt',
				'type'          => 'text',
				'default_value' => '',
				'label'         => esc_html__( 'Excerpt', 'mkdf-tours' ),
				'parent'        => $gallery_section_container
			)
		);
		
		wanderers_mkdf_add_multiple_images_field(
			array(
				'parent'      => $gallery_section_container,
				'name'        => 'mkdf_tours_gallery_images',
				'label'       => esc_html__( 'Gallery Images', 'mkdf-tours' ),
				'description' => esc_html__( 'Choose your gallery images', 'mkdf-tours' )
			)
		);
	}
	
	add_action( 'wanderers_mkdf_meta_boxes_map', 'mkdf_tours_gallery_section_map' );
}

if ( ! function_exists( 'mkdf_tours_review_section_map' ) ) {
	function mkdf_tours_review_section_map() {
		
		$review_section_meta_box = wanderers_mkdf_create_meta_box(
			array(
				'scope' => array( 'tour-item' ),
				'title' => esc_html__( 'Review Section', 'mkdf-tours' ),
				'name'  => 'review_section_meta'
			)
		);
		
		wanderers_mkdf_create_meta_box_field(
			array(
				'name'          => 'mkdf_tours_show_review_section',
				'type'          => 'yesno',
				'label'         => esc_html__( 'Show Review Section', 'mkdf-tours' ),
				'parent'        => $review_section_meta_box,
				'default_value' => 'yes'
			)
		);

        wanderers_mkdf_create_meta_box_field(
            array(
                'name'          => 'mkdf_tours_reviews_title',
                'type'          => 'text',
                'default_value' => '',
                'label'         => esc_html__( 'Title', 'mkdf-tours' ),
                'parent'        => $review_section_meta_box,
                'dependency' => array(
                    'show' => array(
                        'mkdf_tours_show_review_section' => 'yes'
                    )
                )
            )
        );

        wanderers_mkdf_create_meta_box_field(
            array(
                'name'          => 'mkdf_tours_reviews_excerpt',
                'type'          => 'textarea',
                'default_value' => '',
                'label'         => esc_html__( 'Excerpt', 'mkdf-tours' ),
                'parent'        => $review_section_meta_box,
                'dependency' => array(
                    'show' => array(
                        'mkdf_tours_show_review_section' => 'yes'
                    )
                )
            )
        );
	}
	
	add_action( 'wanderers_mkdf_meta_boxes_map', 'mkdf_tours_review_section_map' );
}

if ( ! function_exists( 'mkdf_tours_custom_section_1_map' ) ) {
	function mkdf_tours_custom_section_1_map() {
		
		$custom_section_1_meta_box = wanderers_mkdf_create_meta_box(
			array(
				'scope' => array( 'tour-item' ),
				'title' => esc_html__( 'Custom Section 1', 'mkdf-tours' ),
				'name'  => 'custom_section_1_meta'
			)
		);
		
		wanderers_mkdf_create_meta_box_field(
			array(
				'name'          => 'mkdf_tours_show_custom_section_1',
				'type'          => 'yesno',
				'default_value' => 'no',
				'label'         => esc_html__( 'Show Custom Section 1', 'mkdf-tours' ),
				'parent'        => $custom_section_1_meta_box
			)
		);
		
		$custom_section_1_container = wanderers_mkdf_add_admin_container_no_style(
			array(
				'type'       => 'container',
				'name'       => 'custom_section_1_container',
				'parent'     => $custom_section_1_meta_box,
				'dependency' => array(
					'show' => array(
						'mkdf_tours_show_custom_section_1' => 'yes'
					)
				)
			)
		);
		
		wanderers_mkdf_create_meta_box_field(
			array(
				'name'          => 'mkdf_tours_custom_section1_title',
				'type'          => 'text',
				'default_value' => '',
				'label'         => esc_html__( 'Title', 'mkdf-tours' ),
				'parent'        => $custom_section_1_container
			)
		);
		
		wanderers_mkdf_create_meta_box_field(
			array(
				'name'          => 'mkdf_tours_custom_section1_content',
				'type'          => 'textareahtml',
				'default_value' => '',
				'label'         => esc_html__( 'Content', 'mkdf-tours' ),
				'parent'        => $custom_section_1_container
			)
		);
	}
	
	add_action( 'wanderers_mkdf_meta_boxes_map', 'mkdf_tours_custom_section_1_map' );
}

if ( ! function_exists( 'mkdf_tours_custom_section_2_map' ) ) {
	function mkdf_tours_custom_section_2_map() {
		
		$custom_section_2_meta_box = wanderers_mkdf_create_meta_box(
			array(
				'scope' => array( 'tour-item' ),
				'title' => esc_html__( 'Custom Section 2', 'mkdf-tours' ),
				'name'  => 'custom_section_2_meta'
			)
		);
		
		wanderers_mkdf_create_meta_box_field(
			array(
				'name'          => 'mkdf_tours_show_custom_section_2',
				'type'          => 'yesno',
				'default_value' => 'no',
				'label'         => esc_html__( 'Show Custom Section 2', 'mkdf-tours' ),
				'parent'        => $custom_section_2_meta_box
			)
		);
		
		$custom_section_2_container = wanderers_mkdf_add_admin_container_no_style(
			array(
				'type'       => 'container',
				'name'       => 'custom_section_2_container',
				'parent'     => $custom_section_2_meta_box,
				'dependency' => array(
					'show' => array(
						'mkdf_tours_show_custom_section_2' => 'yes'
					)
				)
			)
		);
		
		wanderers_mkdf_create_meta_box_field(
			array(
				'name'          => 'mkdf_tours_custom_section2_title',
				'type'          => 'text',
				'default_value' => '',
				'label'         => esc_html__( 'Title', 'mkdf-tours' ),
				'parent'        => $custom_section_2_container
			)
		);
		
		wanderers_mkdf_create_meta_box_field(
			array(
				'name'          => 'mkdf_tours_custom_section2_content',
				'type'          => 'textareahtml',
				'default_value' => '',
				'label'         => esc_html__( 'Content', 'mkdf-tours' ),
				'parent'        => $custom_section_2_container
			)
		);
	}
	
	add_action( 'wanderers_mkdf_meta_boxes_map', 'mkdf_tours_custom_section_2_map' );
}