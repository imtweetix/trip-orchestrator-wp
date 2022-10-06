<?php

if ( ! function_exists( 'wanderers_mkdf_mobile_header_options_map' ) ) {
	function wanderers_mkdf_mobile_header_options_map() {
		
		wanderers_mkdf_add_admin_page(
			array(
				'slug'  => '_mobile_header',
				'title' => esc_html__( 'Mobile Header', 'wanderers' ),
				'icon'  => 'fa fa-mobile'
			)
		);
		
		$panel_mobile_header = wanderers_mkdf_add_admin_panel(
			array(
				'title' => esc_html__( 'Mobile Header', 'wanderers' ),
				'name'  => 'panel_mobile_header',
				'page'  => '_mobile_header'
			)
		);
		
		$mobile_header_group = wanderers_mkdf_add_admin_group(
			array(
				'parent' => $panel_mobile_header,
				'name'   => 'mobile_header_group',
				'title'  => esc_html__( 'Mobile Header Styles', 'wanderers' )
			)
		);
		
		$mobile_header_row1 = wanderers_mkdf_add_admin_row(
			array(
				'parent' => $mobile_header_group,
				'name'   => 'mobile_header_row1'
			)
		);
		
		wanderers_mkdf_add_admin_field(
			array(
				'name'   => 'mobile_header_height',
				'type'   => 'textsimple',
				'label'  => esc_html__( 'Height', 'wanderers' ),
				'parent' => $mobile_header_row1,
				'args'   => array(
					'col_width' => 3,
					'suffix'    => 'px'
				)
			)
		);
		
		wanderers_mkdf_add_admin_field(
			array(
				'name'   => 'mobile_header_background_color',
				'type'   => 'colorsimple',
				'label'  => esc_html__( 'Background Color', 'wanderers' ),
				'parent' => $mobile_header_row1
			)
		);
		
		wanderers_mkdf_add_admin_field(
			array(
				'name'   => 'mobile_header_border_bottom_color',
				'type'   => 'colorsimple',
				'label'  => esc_html__( 'Border Bottom Color', 'wanderers' ),
				'parent' => $mobile_header_row1
			)
		);
		
		$mobile_menu_group = wanderers_mkdf_add_admin_group(
			array(
				'parent' => $panel_mobile_header,
				'name'   => 'mobile_menu_group',
				'title'  => esc_html__( 'Mobile Menu Styles', 'wanderers' )
			)
		);
		
		$mobile_menu_row1 = wanderers_mkdf_add_admin_row(
			array(
				'parent' => $mobile_menu_group,
				'name'   => 'mobile_menu_row1'
			)
		);
		
		wanderers_mkdf_add_admin_field(
			array(
				'name'   => 'mobile_menu_background_color',
				'type'   => 'colorsimple',
				'label'  => esc_html__( 'Background Color', 'wanderers' ),
				'parent' => $mobile_menu_row1
			)
		);
		
		wanderers_mkdf_add_admin_field(
			array(
				'name'   => 'mobile_menu_border_bottom_color',
				'type'   => 'colorsimple',
				'label'  => esc_html__( 'Border Bottom Color', 'wanderers' ),
				'parent' => $mobile_menu_row1
			)
		);
		
		wanderers_mkdf_add_admin_field(
			array(
				'name'   => 'mobile_menu_separator_color',
				'type'   => 'colorsimple',
				'label'  => esc_html__( 'Menu Item Separator Color', 'wanderers' ),
				'parent' => $mobile_menu_row1
			)
		);
		
		wanderers_mkdf_add_admin_field(
			array(
				'name'        => 'mobile_logo_height',
				'type'        => 'text',
				'label'       => esc_html__( 'Logo Height For Mobile Header', 'wanderers' ),
				'description' => esc_html__( 'Define logo height for screen size smaller than 1024px', 'wanderers' ),
				'parent'      => $panel_mobile_header,
				'args'        => array(
					'col_width' => 3,
					'suffix'    => 'px'
				)
			)
		);
		
		wanderers_mkdf_add_admin_field(
			array(
				'name'        => 'mobile_logo_height_phones',
				'type'        => 'text',
				'label'       => esc_html__( 'Logo Height For Mobile Devices', 'wanderers' ),
				'description' => esc_html__( 'Define logo height for screen size smaller than 480px', 'wanderers' ),
				'parent'      => $panel_mobile_header,
				'args'        => array(
					'col_width' => 3,
					'suffix'    => 'px'
				)
			)
		);
		
		wanderers_mkdf_add_admin_section_title(
			array(
				'parent' => $panel_mobile_header,
				'name'   => 'mobile_header_fonts_title',
				'title'  => esc_html__( 'Typography', 'wanderers' )
			)
		);
		
		$first_level_group = wanderers_mkdf_add_admin_group(
			array(
				'parent'      => $panel_mobile_header,
				'name'        => 'first_level_group',
				'title'       => esc_html__( '1st Level Menu', 'wanderers' ),
				'description' => esc_html__( 'Define styles for 1st level in Mobile Menu Navigation', 'wanderers' )
			)
		);
		
		$first_level_row1 = wanderers_mkdf_add_admin_row(
			array(
				'parent' => $first_level_group,
				'name'   => 'first_level_row1'
			)
		);
		
		wanderers_mkdf_add_admin_field(
			array(
				'name'   => 'mobile_text_color',
				'type'   => 'colorsimple',
				'label'  => esc_html__( 'Text Color', 'wanderers' ),
				'parent' => $first_level_row1
			)
		);
		
		wanderers_mkdf_add_admin_field(
			array(
				'name'   => 'mobile_text_hover_color',
				'type'   => 'colorsimple',
				'label'  => esc_html__( 'Hover/Active Text Color', 'wanderers' ),
				'parent' => $first_level_row1
			)
		);
		
		wanderers_mkdf_add_admin_field(
			array(
				'name'   => 'mobile_text_google_fonts',
				'type'   => 'fontsimple',
				'label'  => esc_html__( 'Font Family', 'wanderers' ),
				'parent' => $first_level_row1
			)
		);
		
		wanderers_mkdf_add_admin_field(
			array(
				'name'   => 'mobile_text_font_size',
				'type'   => 'textsimple',
				'label'  => esc_html__( 'Font Size', 'wanderers' ),
				'parent' => $first_level_row1,
				'args'   => array(
					'col_width' => 3,
					'suffix'    => 'px'
				)
			)
		);
		
		$first_level_row2 = wanderers_mkdf_add_admin_row(
			array(
				'parent' => $first_level_group,
				'name'   => 'first_level_row2'
			)
		);
		
		wanderers_mkdf_add_admin_field(
			array(
				'name'   => 'mobile_text_line_height',
				'type'   => 'textsimple',
				'label'  => esc_html__( 'Line Height', 'wanderers' ),
				'parent' => $first_level_row2,
				'args'   => array(
					'col_width' => 3,
					'suffix'    => 'px'
				)
			)
		);
		
		wanderers_mkdf_add_admin_field(
			array(
				'name'    => 'mobile_text_text_transform',
				'type'    => 'selectsimple',
				'label'   => esc_html__( 'Text Transform', 'wanderers' ),
				'parent'  => $first_level_row2,
				'options' => wanderers_mkdf_get_text_transform_array()
			)
		);
		
		wanderers_mkdf_add_admin_field(
			array(
				'name'    => 'mobile_text_font_style',
				'type'    => 'selectsimple',
				'label'   => esc_html__( 'Font Style', 'wanderers' ),
				'parent'  => $first_level_row2,
				'options' => wanderers_mkdf_get_font_style_array()
			)
		);
		
		wanderers_mkdf_add_admin_field(
			array(
				'name'    => 'mobile_text_font_weight',
				'type'    => 'selectsimple',
				'label'   => esc_html__( 'Font Weight', 'wanderers' ),
				'parent'  => $first_level_row2,
				'options' => wanderers_mkdf_get_font_weight_array()
			)
		);
		
		$first_level_row3 = wanderers_mkdf_add_admin_row(
			array(
				'parent' => $first_level_group,
				'name'   => 'first_level_row3'
			)
		);
		
		wanderers_mkdf_add_admin_field(
			array(
				'type'          => 'textsimple',
				'name'          => 'mobile_text_letter_spacing',
				'label'         => esc_html__( 'Letter Spacing', 'wanderers' ),
				'default_value' => '',
				'parent'        => $first_level_row3,
				'args'          => array(
					'suffix' => 'px'
				)
			)
		);
		
		$second_level_group = wanderers_mkdf_add_admin_group(
			array(
				'parent'      => $panel_mobile_header,
				'name'        => 'second_level_group',
				'title'       => esc_html__( 'Dropdown Menu', 'wanderers' ),
				'description' => esc_html__( 'Define styles for drop down menu items in Mobile Menu Navigation', 'wanderers' )
			)
		);
		
		$second_level_row1 = wanderers_mkdf_add_admin_row(
			array(
				'parent' => $second_level_group,
				'name'   => 'second_level_row1'
			)
		);
		
		wanderers_mkdf_add_admin_field(
			array(
				'name'   => 'mobile_dropdown_text_color',
				'type'   => 'colorsimple',
				'label'  => esc_html__( 'Text Color', 'wanderers' ),
				'parent' => $second_level_row1
			)
		);
		
		wanderers_mkdf_add_admin_field(
			array(
				'name'   => 'mobile_dropdown_text_hover_color',
				'type'   => 'colorsimple',
				'label'  => esc_html__( 'Hover/Active Text Color', 'wanderers' ),
				'parent' => $second_level_row1
			)
		);
		
		wanderers_mkdf_add_admin_field(
			array(
				'name'   => 'mobile_dropdown_text_google_fonts',
				'type'   => 'fontsimple',
				'label'  => esc_html__( 'Font Family', 'wanderers' ),
				'parent' => $second_level_row1
			)
		);
		
		wanderers_mkdf_add_admin_field(
			array(
				'name'   => 'mobile_dropdown_text_font_size',
				'type'   => 'textsimple',
				'label'  => esc_html__( 'Font Size', 'wanderers' ),
				'parent' => $second_level_row1,
				'args'   => array(
					'col_width' => 3,
					'suffix'    => 'px'
				)
			)
		);
		
		$second_level_row2 = wanderers_mkdf_add_admin_row(
			array(
				'parent' => $second_level_group,
				'name'   => 'second_level_row2'
			)
		);
		
		wanderers_mkdf_add_admin_field(
			array(
				'name'   => 'mobile_dropdown_text_line_height',
				'type'   => 'textsimple',
				'label'  => esc_html__( 'Line Height', 'wanderers' ),
				'parent' => $second_level_row2,
				'args'   => array(
					'col_width' => 3,
					'suffix'    => 'px'
				)
			)
		);
		
		wanderers_mkdf_add_admin_field(
			array(
				'name'    => 'mobile_dropdown_text_text_transform',
				'type'    => 'selectsimple',
				'label'   => esc_html__( 'Text Transform', 'wanderers' ),
				'parent'  => $second_level_row2,
				'options' => wanderers_mkdf_get_text_transform_array()
			)
		);
		
		wanderers_mkdf_add_admin_field(
			array(
				'name'    => 'mobile_dropdown_text_font_style',
				'type'    => 'selectsimple',
				'label'   => esc_html__( 'Font Style', 'wanderers' ),
				'parent'  => $second_level_row2,
				'options' => wanderers_mkdf_get_font_style_array()
			)
		);
		
		wanderers_mkdf_add_admin_field(
			array(
				'name'    => 'mobile_dropdown_text_font_weight',
				'type'    => 'selectsimple',
				'label'   => esc_html__( 'Font Weight', 'wanderers' ),
				'parent'  => $second_level_row2,
				'options' => wanderers_mkdf_get_font_weight_array()
			)
		);
		
		$second_level_row3 = wanderers_mkdf_add_admin_row(
			array(
				'parent' => $second_level_group,
				'name'   => 'second_level_row3'
			)
		);
		
		wanderers_mkdf_add_admin_field(
			array(
				'type'          => 'textsimple',
				'name'          => 'mobile_dropdown_text_letter_spacing',
				'label'         => esc_html__( 'Letter Spacing', 'wanderers' ),
				'default_value' => '',
				'parent'        => $second_level_row3,
				'args'          => array(
					'suffix' => 'px'
				)
			)
		);
		
		wanderers_mkdf_add_admin_section_title(
			array(
				'name'   => 'mobile_opener_panel',
				'parent' => $panel_mobile_header,
				'title'  => esc_html__( 'Mobile Menu Opener', 'wanderers' )
			)
		);
		
		wanderers_mkdf_add_admin_field(
			array(
				'name'        => 'mobile_menu_title',
				'type'        => 'text',
				'label'       => esc_html__( 'Mobile Navigation Title', 'wanderers' ),
				'description' => esc_html__( 'Enter title for mobile menu navigation', 'wanderers' ),
				'parent'      => $panel_mobile_header,
				'args'        => array(
					'col_width' => 3
				)
			)
		);
		
		wanderers_mkdf_add_admin_field(
			array(
				'name'   => 'mobile_icon_color',
				'type'   => 'color',
				'label'  => esc_html__( 'Mobile Navigation Icon Color', 'wanderers' ),
				'parent' => $panel_mobile_header
			)
		);
		
		wanderers_mkdf_add_admin_field(
			array(
				'name'   => 'mobile_icon_hover_color',
				'type'   => 'color',
				'label'  => esc_html__( 'Mobile Navigation Icon Hover Color', 'wanderers' ),
				'parent' => $panel_mobile_header
			)
		);
	}
	
	add_action( 'wanderers_mkdf_options_map', 'wanderers_mkdf_mobile_header_options_map', 5 );
}