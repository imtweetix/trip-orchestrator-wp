<?php

if ( ! function_exists( 'mkdf_tours_map_booking_meta' ) ) {
	function mkdf_tours_map_booking_meta() {
		global $post;

		$tour_booking_meta_box = wanderers_mkdf_create_meta_box(
			array(
				'scope' => apply_filters( 'wanderers_mkdf_set_scope_for_meta_boxes', array( 'tour-item' ), 'tour_booking_meta' ),
				'title' => esc_html__( 'Tour Booking', 'mkdf-tours' ),
				'name'  => 'tour_booking_meta'
			)
		);
		
		wanderers_mkdf_add_repeater_field( array(
				'name'        => 'tour_booking',
				'parent'      => $tour_booking_meta_box,
				'button_text' => esc_html__( 'Add New Period', 'mkdf-tours' ),
				'fields'      => array(
					array(
						'name'      => 'start_date',
						'type'      => 'date',
						'label'     => esc_html__( 'Start Date', 'mkdf-tours' ),
						'col_width' => '6',
						'args'      => array(
							'col_width' => '12'
						)
					),
					array(
						'name'      => 'end_date',
						'type'      => 'date',
						'label'     => esc_html__( 'End Date', 'mkdf-tours' ),
						'col_width' => '6',
						'args'      => array(
							'col_width' => '12'
						)
					),
					array(
						'name'      => 'days',
						'type'      => 'checkboxgroup',
						'label'     => esc_html__( 'Tour Days', 'mkdf-tours' ),
						'options'   => array(
							'Mon' => esc_html__( 'Monday', 'mkdf-tours' ),
							'Tue' => esc_html__( 'Tuesday', 'mkdf-tours' ),
							'Wed' => esc_html__( 'Wednesday', 'mkdf-tours' ),
							'Thu' => esc_html__( 'Thursday', 'mkdf-tours' ),
							'Fri' => esc_html__( 'Friday', 'mkdf-tours' ),
							'Sat' => esc_html__( 'Saturday', 'mkdf-tours' ),
							'Sun' => esc_html__( 'Sunday', 'mkdf-tours' )
						),
						'col_width' => '12'
					),
					array(
						'name'        => 'tour_time',
						'type'        => 'repeater',
						'label'       => esc_html__( 'Departure Time', 'mkdf-tours' ),
						'button_text' => esc_html__( 'Add New Time', 'mkdf-tours' ),
						'fields'      => array(
							array(
								'name' => 'time',
								'type' => 'text',
								'args' => array(
									'col_width' => '3'
								)
							)
						)
					),
					array(
						'name'      => 'number_of_tickets',
						'type'      => 'text',
						'label'     => esc_html__( 'Tickets', 'mkdf-tours' ),
						'col_width' => '3'
					),
					array(
						'name'        => 'price_change',
						'type'        => 'text',
						'label'       => esc_html__( 'Price Changes', 'mkdf-tours' ),
						'description' => esc_html__( 'Use this field for defining special price for this period. Use "%" in front of the number to change the price in percentage.', 'mkdf-tours' ),
						'col_width'   => '9'
					),
				)
			)
		);
	}
	
	add_action( 'wanderers_mkdf_meta_boxes_map', 'mkdf_tours_map_booking_meta', 10 );
}