<?php

if ( ! function_exists( 'mkdf_tours_tour_options_map' ) ) {
	function mkdf_tours_tour_options_map() {
		
		wanderers_mkdf_add_admin_page(
			array(
				'slug'  => '_tours_page',
				'title' => esc_html__( 'Tours', 'mkdf-tours' ),
				'icon'  => 'fa fa-camera-retro'
			)
		);
		
		$panel_payment = wanderers_mkdf_add_admin_panel(
			array(
				'title' => esc_html__( 'Payment', 'mkdf-tours' ),
				'name'  => 'panel_payment',
				'page'  => '_tours_page'
			)
		);
		
		wanderers_mkdf_add_admin_section_title(
			array(
				'parent' => $panel_payment,
				'name'   => 'paypal_section_title',
				'title'  => esc_html__( 'PayPal', 'mkdf-tours' )
			)
		);
		
		wanderers_mkdf_add_admin_field(
			array(
				'name'          => 'tours_enable_paypal',
				'type'          => 'yesno',
				'default_value' => 'yes',
				'label'         => esc_html__( 'Enable Paypal', 'mkdf-tours' ),
				'description'   => esc_html__( 'This option will enable/disable Paypal payment', 'mkdf-tours' ),
				'parent'        => $panel_payment
			)
		);
		
		$show_paypal_container = wanderers_mkdf_add_admin_container(
			array(
				'parent'     => $panel_payment,
				'name'       => 'show_paypal_container',
				'dependency' => array(
					'show' => array(
						'tours_enable_paypal' => 'yes'
					)
				)
			)
		);
		
		wanderers_mkdf_add_admin_field(
			array(
				'name'          => 'paypal_facilitator_id',
				'type'          => 'text',
				'default_value' => '',
				'label'         => esc_html__( 'Account ID', 'mkdf-tours' ),
				'description'   => esc_html__( 'Insert Business Account ID (Email)', 'mkdf-tours' ),
				'parent'        => $show_paypal_container
			)
		);
		
		wanderers_mkdf_add_admin_field(
			array(
				'name'          => 'paypal_currency',
				'type'          => 'select',
				'default_value' => 'USD',
				'label'         => esc_html__( 'Currency', 'mkdf-tours' ),
				'description'   => esc_html__( 'Payment Currency', 'mkdf-tours' ),
				'parent'        => $show_paypal_container,
				'options'       => array(
					'USD' => esc_html__( 'U.S. Dollar', 'mkdf-tours' ),
					'EUR' => esc_html__( 'Euro', 'mkdf-tours' ),
					'GBP' => esc_html__( 'Pound Sterling', 'mkdf-tours' ),
					'AUD' => esc_html__( 'Australian Dollar', 'mkdf-tours' ),
					'CHF' => esc_html__( 'Swiss Franc', 'mkdf-tours' ),
					'BRL' => esc_html__( 'Brazilian Real', 'mkdf-tours' ),
					'CAD' => esc_html__( 'Canadian Dollar', 'mkdf-tours' ),
					'CZK' => esc_html__( 'Czech Koruna', 'mkdf-tours' ),
					'DKK' => esc_html__( 'Danish Krone', 'mkdf-tours' ),
					'HKD' => esc_html__( 'Hong Kong Dollar', 'mkdf-tours' ),
					'HUF' => esc_html__( 'Hungarian Forint', 'mkdf-tours' ),
					'ILS' => esc_html__( 'Israeli New Sheqel', 'mkdf-tours' ),
					'JPY' => esc_html__( 'Japanese Yen', 'mkdf-tours' ),
					'MYR' => esc_html__( 'Malaysian Ringgit', 'mkdf-tours' ),
					'MXN' => esc_html__( 'Mexican Peso', 'mkdf-tours' ),
					'NOK' => esc_html__( 'Norwegian Krone', 'mkdf-tours' ),
					'NZD' => esc_html__( 'New Zealand Dollar', 'mkdf-tours' ),
					'PHP' => esc_html__( 'Philippine Peso', 'mkdf-tours' ),
					'PLN' => esc_html__( 'Polish Zloty', 'mkdf-tours' ),
					'SGD' => esc_html__( 'Singapore Dollar', 'mkdf-tours' ),
					'SEK' => esc_html__( 'Swedish Krona', 'mkdf-tours' ),
					'TWD' => esc_html__( 'Taiwan New Dollar', 'mkdf-tours' ),
					'THB' => esc_html__( 'Thai Baht', 'mkdf-tours' ),
					'TRY' => esc_html__( 'Turkish Lira', 'mkdf-tours' )
				)
			)
		);
		
		$settings_panel = wanderers_mkdf_add_admin_panel(
			array(
				'title' => esc_html__( 'Settings', 'mkdf-tours' ),
				'name'  => 'panel_settings',
				'page'  => '_tours_page'
			)
		);
		
		$checkout_pages = mkdf_tours_get_checkout_pages( true );
		
		wanderers_mkdf_add_admin_field(
			array(
				'name'          => 'tours_checkout_page',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__( 'Checkout Page', 'mkdf-tours' ),
				'description'   => esc_html__( 'Choose checkout page', 'mkdf-tours' ),
				'parent'        => $settings_panel,
				'options'       => $checkout_pages,
				'args'          => array(
					'col_width' => 3
				)
			)
		);
		
		wanderers_mkdf_add_admin_field(
			array(
				'name'          => 'tours_currency_symbol',
				'type'          => 'text',
				'default_value' => '',
				'label'         => esc_html__( 'Price Currency', 'mkdf-tours' ),
				'description'   => esc_html__( 'Insert currency for tour prices', 'mkdf-tours' ),
				'parent'        => $settings_panel,
				'args'          => array(
					'col_width' => '3'
				)
			)
		);
		
		wanderers_mkdf_add_admin_field(
			array(
				'name'          => 'tours_currency_symbol_position',
				'type'          => 'select',
				'default_value' => 'left',
				'label'         => esc_html__( 'Price Currency Position', 'mkdf-tours' ),
				'description'   => esc_html__( 'Choose position for your currency symbol', 'mkdf-tours' ),
				'parent'        => $settings_panel,
				'options'       => array(
					'left'  => esc_html__( 'Left', 'mkdf-tours' ),
					'right' => esc_html__( 'Right', 'mkdf-tours' )
				),
				'args'          => array(
					'col_width' => 3
				)
			)
		);
		
		$search_pages = mkdf_tours_get_search_pages( true );
		
		$search_panel = wanderers_mkdf_add_admin_panel(
			array(
				'title' => esc_html__( 'Search Page', 'mkdf-tours' ),
				'name'  => 'panel_search',
				'page'  => '_tours_page'
			)
		);
		
		wanderers_mkdf_add_admin_field(
			array(
				'parent'        => $search_panel,
				'type'          => 'select',
				'name'          => 'tours_search_main_page',
				'default_value' => '',
				'label'         => esc_html__( 'Main Search Page', 'mkdf-tours' ),
				'description'   => esc_html__( 'Choose main search page. Defaults to tour item archive page', 'mkdf-tours' ),
				'options'       => $search_pages,
				'args'          => array(
					'col_width' => 3
				)
			)
		);
		
		wanderers_mkdf_add_admin_field(
			array(
				'parent'        => $search_panel,
				'type'          => 'text',
				'name'          => 'tours_per_page',
				'default_value' => 12,
				'label'         => esc_html__( 'Items per Page', 'mkdf-tours' ),
				'description'   => esc_html__( 'Choose number of tour items per page', 'mkdf-tours' ),
				'args'          => array(
					'col_width' => 3
				)
			)
		);
		
		wanderers_mkdf_add_admin_field(
			array(
				'parent'        => $search_panel,
				'type'          => 'select',
				'name'          => 'tours_search_default_view_type',
				'default_value' => 'list',
				'label'         => esc_html__( 'Default Tour View Type', 'mkdf-tours' ),
				'description'   => esc_html__( 'Choose default tour view type', 'mkdf-tours' ),
				'options'       => array(
					'list'     => esc_html__( 'List', 'mkdf-tours' ),
					'standard' => esc_html__( 'Standard', 'mkdf-tours' ),
					'gallery'  => esc_html__( 'Gallery', 'mkdf-tours' )
				),
				'args'          => array(
					'col_width' => 3
				)
			)
		);
		
		wanderers_mkdf_add_admin_field(
			array(
				'parent'        => $search_panel,
				'type'          => 'select',
				'name'          => 'tours_search_default_ordering',
				'default_value' => 'date',
				'label'         => esc_html__( 'Default Tour Ordering', 'mkdf-tours' ),
				'description'   => esc_html__( 'Choose default tour ordering', 'mkdf-tours' ),
				'options'       => array(
					'date'       => esc_html__( 'Date', 'mkdf-tours' ),
					'price_low'  => esc_html__( 'Price Low to High', 'mkdf-tours' ),
					'price_high' => esc_html__( 'Price High to Low', 'mkdf-tours' ),
					'name'       => esc_html__( 'Name', 'mkdf-tours' )
				),
				'args'          => array(
					'col_width' => 3
				)
			)
		);
		
		wanderers_mkdf_add_admin_field(
			array(
				'parent'        => $search_panel,
				'type'          => 'text',
				'name'          => 'tours_standard_text_length',
				'default_value' => 55,
				'label'         => esc_html__( 'Standard Item Text Length', 'mkdf-tours' ),
				'description'   => esc_html__( 'Choose number of words for standard tour item', 'mkdf-tours' ),
				'args'          => array(
					'col_width' => 3
				)
			)
		);
		
		wanderers_mkdf_add_admin_field(
			array(
				'parent'        => $search_panel,
				'type'          => 'select',
				'name'          => 'tours_standard_thumb_size',
				'default_value' => 'full',
				'label'         => esc_html__( 'Standard Thumbnail Size', 'mkdf-tours' ),
				'description'   => esc_html__( 'Choose thumbnail size for standard tour item', 'mkdf-tours' ),
				'options'       => array(
					'full'                           => esc_html__( 'Full', 'mkdf-tours' ),
					'wanderers_mkdf_landscape' => esc_html__( 'Landscape', 'mkdf-tours' ),
					'wanderers_mkdf_portrait'  => esc_html__( 'Portrait', 'mkdf-tours' ),
					'wanderers_mkdf_square'    => esc_html__( 'Square', 'mkdf-tours' ),
					'600x695'    => esc_html__( 'Custom Predefined', 'mkdf-tours' )
				),
				'args'          => array(
					'col_width' => 3
				)
			)
		);
		
		wanderers_mkdf_add_admin_field(
			array(
				'parent'        => $search_panel,
				'type'          => 'text',
				'name'          => 'tours_gallery_text_length',
				'default_value' => 55,
				'label'         => esc_html__( 'Gallery Item Text Length', 'mkdf-tours' ),
				'description'   => esc_html__( 'Choose number of words for gallery tour item', 'mkdf-tours' ),
				'args'          => array(
					'col_width' => 3
				)
			)
		);
		
		wanderers_mkdf_add_admin_field(
			array(
				'parent'        => $search_panel,
				'type'          => 'select',
				'name'          => 'tours_gallery_thumb_size',
				'default_value' => 'full',
				'options'       => array(
					'full'                           => esc_html__( 'Full', 'mkdf-tours' ),
					'wanderers_mkdf_landscape' => esc_html__( 'Landscape', 'mkdf-tours' ),
					'wanderers_mkdf_portrait'  => esc_html__( 'Portrait', 'mkdf-tours' ),
					'wanderers_mkdf_square'    => esc_html__( 'Square', 'mkdf-tours' ),
					'600x695'    => esc_html__( 'Custom Predefined', 'mkdf-tours' )
				),
				'label'         => esc_html__( 'Gallery Thumbnail Size', 'mkdf-tours' ),
				'description'   => esc_html__( 'Choose thumbnail size for gallery tour item', 'mkdf-tours' ),
				'args'          => array(
					'col_width' => 3
				)
			)
		);
		
		wanderers_mkdf_add_admin_field(
			array(
				'parent'        => $search_panel,
				'type'          => 'text',
				'name'          => 'tours_list_text_length',
				'default_value' => 55,
				'label'         => esc_html__( 'List Item Text Length', 'mkdf-tours' ),
				'description'   => esc_html__( 'Choose number of words for list tour item', 'mkdf-tours' ),
				'args'          => array(
					'col_width' => 3
				)
			)
		);
		
		$reviews_panel = wanderers_mkdf_add_admin_panel(
			array(
				'title' => esc_html__( 'Reviews', 'mkdf-tours' ),
				'name'  => 'panel_reviews',
				'page'  => '_tours_page'
			)
		);
		
		wanderers_mkdf_add_admin_field(
			array(
				'parent'        => $reviews_panel,
				'type'          => 'text',
				'name'          => 'reviews_section_title',
				'default_value' => '',
				'label'         => esc_html__( 'Reviews Section Title', 'mkdf-tours' ),
				'description'   => esc_html__( 'Enter title that you want to show before average rating for each tour', 'mkdf-tours' ),
			)
		);
		
		wanderers_mkdf_add_admin_field(
			array(
				'parent'        => $reviews_panel,
				'type'          => 'textarea',
				'name'          => 'reviews_section_subtitle',
				'default_value' => '',
				'label'         => esc_html__( 'Reviews Section Subtitle', 'mkdf-tours' ),
				'description'   => esc_html__( 'Enter subtitle that you want to show before average rating for each tour', 'mkdf-tours' ),
			)
		);
		
		$panel_admin_email = wanderers_mkdf_add_admin_panel(
			array(
				'title' => esc_html__( 'Admin Booking Email', 'mkdf-tours' ),
				'name'  => 'admin_email',
				'page'  => '_tours_page'
			)
		);
		
		wanderers_mkdf_add_admin_field(
			array(
				'parent'        => $panel_admin_email,
				'type'          => 'yesno',
				'name'          => 'enable_admin_booking_email',
				'default_value' => 'yes',
				'label'         => esc_html__( 'Should Admin Receive Booking Emails?', 'mkdf-tours' ),
				'description'   => esc_html__( 'Enabling this option will forward all booking emails to the site administrator’s inbox', 'mkdf-tours' ),
				'args'          => array(
					"dependence"             => true,
					"dependence_hide_on_yes" => "",
					"dependence_show_on_yes" => "#mkdf_show_admin_email_container"
				)
			)
		);
		
		$show_admin_email_container = wanderers_mkdf_add_admin_container(
			array(
				'parent'     => $panel_admin_email,
				'name'       => 'show_admin_email_container',
				'dependency' => array(
					'show' => array(
						'enable_admin_booking_email' => 'yes'
					)
				)
			)
		);
		
		wanderers_mkdf_add_admin_field(
			array(
				'name'          => 'admin_email',
				'type'          => 'text',
				'default_value' => '',
				'label'         => esc_html__( 'Admin Email', 'mkdf-tours' ),
				'description'   => esc_html__( 'Input the site administrator’s email address. If you leave this field empty, booking emails will be sent to the default admin’s email address', 'mkdf-tours' ),
				'parent'        => $show_admin_email_container
			)
		);
	}
	
	add_action( 'wanderers_mkdf_options_map', 'mkdf_tours_tour_options_map', 11 );
}