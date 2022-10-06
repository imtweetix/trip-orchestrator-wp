<?php


if ( ! function_exists( 'wanderers_mkdf_search_options_map' ) ) {
	function wanderers_mkdf_search_options_map() {
		
		wanderers_mkdf_add_admin_page(
			array(
				'slug'  => '_search_page',
				'title' => esc_html__( 'Search', 'wanderers' ),
				'icon'  => 'fa fa-search'
			)
		);
		
		$search_page_panel = wanderers_mkdf_add_admin_panel(
			array(
				'title' => esc_html__( 'Search Page', 'wanderers' ),
				'name'  => 'search_template',
				'page'  => '_search_page'
			)
		);
		
		wanderers_mkdf_add_admin_field(
			array(
				'name'          => 'search_page_layout',
				'type'          => 'select',
				'label'         => esc_html__( 'Layout', 'wanderers' ),
				'default_value' => 'in-grid',
				'description'   => esc_html__( 'Set layout. Default is in grid.', 'wanderers' ),
				'parent'        => $search_page_panel,
				'options'       => array(
					'in-grid'    => esc_html__( 'In Grid', 'wanderers' ),
					'full-width' => esc_html__( 'Full Width', 'wanderers' )
				)
			)
		);
		
		wanderers_mkdf_add_admin_field(
			array(
				'name'          => 'search_page_sidebar_layout',
				'type'          => 'select',
				'label'         => esc_html__( 'Sidebar Layout', 'wanderers' ),
				'description'   => esc_html__( "Choose a sidebar layout for search page", 'wanderers' ),
				'default_value' => 'no-sidebar',
				'options'       => wanderers_mkdf_get_custom_sidebars_options(),
				'parent'        => $search_page_panel
			)
		);
		
		$wanderers_custom_sidebars = wanderers_mkdf_get_custom_sidebars();
		if ( count( $wanderers_custom_sidebars ) > 0 ) {
			wanderers_mkdf_add_admin_field(
				array(
					'name'        => 'search_custom_sidebar_area',
					'type'        => 'selectblank',
					'label'       => esc_html__( 'Sidebar to Display', 'wanderers' ),
					'description' => esc_html__( 'Choose a sidebar to display on search page. Default sidebar is "Sidebar"', 'wanderers' ),
					'parent'      => $search_page_panel,
					'options'     => $wanderers_custom_sidebars,
					'args'        => array(
						'select2' => true
					)
				)
			);
		}
		
		$search_panel = wanderers_mkdf_add_admin_panel(
			array(
				'title' => esc_html__( 'Search', 'wanderers' ),
				'name'  => 'search',
				'page'  => '_search_page'
			)
		);
		
		wanderers_mkdf_add_admin_field(
			array(
				'parent'        => $search_panel,
				'type'          => 'select',
				'name'          => 'search_icon_pack',
				'default_value' => 'font_elegant',
				'label'         => esc_html__( 'Search Icon Pack', 'wanderers' ),
				'description'   => esc_html__( 'Choose icon pack for search icon', 'wanderers' ),
				'options'       => wanderers_mkdf_icon_collections()->getIconCollectionsExclude( array( 'linea_icons' ) )
			)
		);

        wanderers_mkdf_add_admin_field(
            array(
                'type'          => 'select',
                'name'          => 'search_sidebar_columns',
                'parent'        => $search_panel,
                'default_value' => '3',
                'label'         => esc_html__( 'Search Sidebar Columns', 'wanderers' ),
                'description'   => esc_html__( 'Choose number of columns for FullScreen search sidebar area', 'wanderers' ),
                'options'       => array(
                    '1' => '1',
                    '2' => '2',
                    '3' => '3',
                )
            )
        );
		
		wanderers_mkdf_add_admin_field(
			array(
				'parent'        => $search_panel,
				'type'          => 'yesno',
				'name'          => 'search_in_grid',
				'default_value' => 'yes',
				'label'         => esc_html__( 'Enable Grid Layout', 'wanderers' ),
				'description'   => esc_html__( 'Set search area to be in grid. (Applied for Search covers header and Slide from Window Top types.', 'wanderers' ),
			)
		);
		
		wanderers_mkdf_add_admin_section_title(
			array(
				'parent' => $search_panel,
				'name'   => 'initial_header_icon_title',
				'title'  => esc_html__( 'Initial Search Icon in Header', 'wanderers' )
			)
		);
		
		wanderers_mkdf_add_admin_field(
			array(
				'parent'        => $search_panel,
				'type'          => 'text',
				'name'          => 'header_search_icon_size',
				'default_value' => '',
				'label'         => esc_html__( 'Icon Size', 'wanderers' ),
				'description'   => esc_html__( 'Set size for icon', 'wanderers' ),
				'args'          => array(
					'col_width' => 3,
					'suffix'    => 'px'
				)
			)
		);
		
		$search_icon_color_group = wanderers_mkdf_add_admin_group(
			array(
				'parent'      => $search_panel,
				'title'       => esc_html__( 'Icon Colors', 'wanderers' ),
				'description' => esc_html__( 'Define color style for icon', 'wanderers' ),
				'name'        => 'search_icon_color_group'
			)
		);
		
		$search_icon_color_row = wanderers_mkdf_add_admin_row(
			array(
				'parent' => $search_icon_color_group,
				'name'   => 'search_icon_color_row'
			)
		);
		
		wanderers_mkdf_add_admin_field(
			array(
				'parent' => $search_icon_color_row,
				'type'   => 'colorsimple',
				'name'   => 'header_search_icon_color',
				'label'  => esc_html__( 'Color', 'wanderers' )
			)
		);
		
		wanderers_mkdf_add_admin_field(
			array(
				'parent' => $search_icon_color_row,
				'type'   => 'colorsimple',
				'name'   => 'header_search_icon_hover_color',
				'label'  => esc_html__( 'Hover Color', 'wanderers' )
			)
		);
		
		wanderers_mkdf_add_admin_field(
			array(
				'parent'        => $search_panel,
				'type'          => 'yesno',
				'name'          => 'enable_search_icon_text',
				'default_value' => 'no',
				'label'         => esc_html__( 'Enable Search Icon Text', 'wanderers' ),
				'description'   => esc_html__( "Enable this option to show 'Search' text next to search icon in header", 'wanderers' )
			)
		);
		
		$enable_search_icon_text_container = wanderers_mkdf_add_admin_container(
			array(
				'parent'          => $search_panel,
				'name'            => 'enable_search_icon_text_container',
				'dependency' => array(
					'show' => array(
						'enable_search_icon_text' => 'yes'
					)
				)
			)
		);
		
		$enable_search_icon_text_group = wanderers_mkdf_add_admin_group(
			array(
				'parent'      => $enable_search_icon_text_container,
				'title'       => esc_html__( 'Search Icon Text', 'wanderers' ),
				'name'        => 'enable_search_icon_text_group',
				'description' => esc_html__( 'Define style for search icon text', 'wanderers' )
			)
		);
		
		$enable_search_icon_text_row = wanderers_mkdf_add_admin_row(
			array(
				'parent' => $enable_search_icon_text_group,
				'name'   => 'enable_search_icon_text_row'
			)
		);
		
		wanderers_mkdf_add_admin_field(
			array(
				'parent' => $enable_search_icon_text_row,
				'type'   => 'colorsimple',
				'name'   => 'search_icon_text_color',
				'label'  => esc_html__( 'Text Color', 'wanderers' )
			)
		);
		
		wanderers_mkdf_add_admin_field(
			array(
				'parent' => $enable_search_icon_text_row,
				'type'   => 'colorsimple',
				'name'   => 'search_icon_text_color_hover',
				'label'  => esc_html__( 'Text Hover Color', 'wanderers' )
			)
		);
		
		wanderers_mkdf_add_admin_field(
			array(
				'parent'        => $enable_search_icon_text_row,
				'type'          => 'textsimple',
				'name'          => 'search_icon_text_font_size',
				'label'         => esc_html__( 'Font Size', 'wanderers' ),
				'default_value' => '',
				'args'          => array(
					'suffix' => 'px'
				)
			)
		);
		
		wanderers_mkdf_add_admin_field(
			array(
				'parent'        => $enable_search_icon_text_row,
				'type'          => 'textsimple',
				'name'          => 'search_icon_text_line_height',
				'label'         => esc_html__( 'Line Height', 'wanderers' ),
				'default_value' => '',
				'args'          => array(
					'suffix' => 'px'
				)
			)
		);
		
		$enable_search_icon_text_row2 = wanderers_mkdf_add_admin_row(
			array(
				'parent' => $enable_search_icon_text_group,
				'name'   => 'enable_search_icon_text_row2',
				'next'   => true
			)
		);
		
		wanderers_mkdf_add_admin_field(
			array(
				'parent'        => $enable_search_icon_text_row2,
				'type'          => 'selectblanksimple',
				'name'          => 'search_icon_text_text_transform',
				'label'         => esc_html__( 'Text Transform', 'wanderers' ),
				'default_value' => '',
				'options'       => wanderers_mkdf_get_text_transform_array()
			)
		);
		
		wanderers_mkdf_add_admin_field(
			array(
				'parent'        => $enable_search_icon_text_row2,
				'type'          => 'fontsimple',
				'name'          => 'search_icon_text_google_fonts',
				'label'         => esc_html__( 'Font Family', 'wanderers' ),
				'default_value' => '-1',
			)
		);
		
		wanderers_mkdf_add_admin_field(
			array(
				'parent'        => $enable_search_icon_text_row2,
				'type'          => 'selectblanksimple',
				'name'          => 'search_icon_text_font_style',
				'label'         => esc_html__( 'Font Style', 'wanderers' ),
				'default_value' => '',
				'options'       => wanderers_mkdf_get_font_style_array(),
			)
		);
		
		wanderers_mkdf_add_admin_field(
			array(
				'parent'        => $enable_search_icon_text_row2,
				'type'          => 'selectblanksimple',
				'name'          => 'search_icon_text_font_weight',
				'label'         => esc_html__( 'Font Weight', 'wanderers' ),
				'default_value' => '',
				'options'       => wanderers_mkdf_get_font_weight_array(),
			)
		);
		
		$enable_search_icon_text_row3 = wanderers_mkdf_add_admin_row(
			array(
				'parent' => $enable_search_icon_text_group,
				'name'   => 'enable_search_icon_text_row3',
				'next'   => true
			)
		);
		
		wanderers_mkdf_add_admin_field(
			array(
				'parent'        => $enable_search_icon_text_row3,
				'type'          => 'textsimple',
				'name'          => 'search_icon_text_letter_spacing',
				'label'         => esc_html__( 'Letter Spacing', 'wanderers' ),
				'default_value' => '',
				'args'          => array(
					'suffix' => 'px'
				)
			)
		);
	}
	
	add_action( 'wanderers_mkdf_options_map', 'wanderers_mkdf_search_options_map', 16 );
}