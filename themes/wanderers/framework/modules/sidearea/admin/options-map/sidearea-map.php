<?php

if ( ! function_exists( 'wanderers_mkdf_sidearea_options_map' ) ) {
	function wanderers_mkdf_sidearea_options_map() {
		
		wanderers_mkdf_add_admin_page(
			array(
				'slug'  => '_side_area_page',
				'title' => esc_html__( 'Side Area', 'wanderers' ),
				'icon'  => 'fa fa-indent'
			)
		);
		
		$side_area_panel = wanderers_mkdf_add_admin_panel(
			array(
				'title' => esc_html__( 'Side Area', 'wanderers' ),
				'name'  => 'side_area',
				'page'  => '_side_area_page'
			)
		);
		
		$side_area_icon_style_group = wanderers_mkdf_add_admin_group(
			array(
				'parent'      => $side_area_panel,
				'name'        => 'side_area_icon_style_group',
				'title'       => esc_html__( 'Side Area Icon Style', 'wanderers' ),
				'description' => esc_html__( 'Define styles for Side Area icon', 'wanderers' )
			)
		);
		
		$side_area_icon_style_row1 = wanderers_mkdf_add_admin_row(
			array(
				'parent' => $side_area_icon_style_group,
				'name'   => 'side_area_icon_style_row1'
			)
		);
		
		wanderers_mkdf_add_admin_field(
			array(
				'parent' => $side_area_icon_style_row1,
				'type'   => 'colorsimple',
				'name'   => 'side_area_icon_color',
				'label'  => esc_html__( 'Color', 'wanderers' )
			)
		);
		
		wanderers_mkdf_add_admin_field(
			array(
				'parent' => $side_area_icon_style_row1,
				'type'   => 'colorsimple',
				'name'   => 'side_area_icon_hover_color',
				'label'  => esc_html__( 'Hover Color', 'wanderers' )
			)
		);
		
		$side_area_icon_style_row2 = wanderers_mkdf_add_admin_row(
			array(
				'parent' => $side_area_icon_style_group,
				'name'   => 'side_area_icon_style_row2',
				'next'   => true
			)
		);
		
		wanderers_mkdf_add_admin_field(
			array(
				'parent' => $side_area_icon_style_row2,
				'type'   => 'colorsimple',
				'name'   => 'side_area_close_icon_color',
				'label'  => esc_html__( 'Close Icon Color', 'wanderers' )
			)
		);
		
		wanderers_mkdf_add_admin_field(
			array(
				'parent' => $side_area_icon_style_row2,
				'type'   => 'colorsimple',
				'name'   => 'side_area_close_icon_hover_color',
				'label'  => esc_html__( 'Close Icon Hover Color', 'wanderers' )
			)
		);
		
		wanderers_mkdf_add_admin_field(
			array(
				'parent'        => $side_area_panel,
				'type'          => 'text',
				'name'          => 'side_area_width',
				'default_value' => '',
				'label'         => esc_html__( 'Side Area Width', 'wanderers' ),
				'description'   => esc_html__( 'Enter a width for Side Area', 'wanderers' ),
				'args'          => array(
					'col_width' => 3,
					'suffix'    => 'px'
				)
			)
		);
		
		wanderers_mkdf_add_admin_field(
			array(
				'parent'      => $side_area_panel,
				'type'        => 'color',
				'name'        => 'side_area_background_color',
				'label'       => esc_html__( 'Background Color', 'wanderers' ),
				'description' => esc_html__( 'Choose a background color for Side Area', 'wanderers' )
			)
		);

        wanderers_mkdf_add_admin_field(
            array(
                'parent'      => $side_area_panel,
                'type'        => 'image',
                'name'        => 'side_area_background_image',
                'default_value' => '',
                'label'       => esc_html__( 'Background Image', 'wanderers' ),
                'description' => esc_html__( 'Choose a background image for Side Area', 'wanderers' )
            )
        );
		
		wanderers_mkdf_add_admin_field(
			array(
				'parent'      => $side_area_panel,
				'type'        => 'text',
				'name'        => 'side_area_padding',
				'label'       => esc_html__( 'Padding', 'wanderers' ),
				'description' => esc_html__( 'Define padding for Side Area in format top right bottom left', 'wanderers' ),
				'args'        => array(
					'col_width' => 3
				)
			)
		);
		
		wanderers_mkdf_add_admin_field(
			array(
				'parent'        => $side_area_panel,
				'type'          => 'selectblank',
				'name'          => 'side_area_aligment',
				'default_value' => '',
				'label'         => esc_html__( 'Text Alignment', 'wanderers' ),
				'description'   => esc_html__( 'Choose text alignment for side area', 'wanderers' ),
				'options'       => array(
					''       => esc_html__( 'Default', 'wanderers' ),
					'left'   => esc_html__( 'Left', 'wanderers' ),
					'center' => esc_html__( 'Center', 'wanderers' ),
					'right'  => esc_html__( 'Right', 'wanderers' )
				)
			)
		);
	}
	
	add_action( 'wanderers_mkdf_options_map', 'wanderers_mkdf_sidearea_options_map', 15 );
}