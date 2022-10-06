<?php

if ( ! function_exists( 'wanderers_mkdf_general_options_map' ) ) {
	/**
	 * General options page
	 */
	function wanderers_mkdf_general_options_map() {
		
		wanderers_mkdf_add_admin_page(
			array(
				'slug'  => '',
				'title' => esc_html__( 'General', 'wanderers' ),
				'icon'  => 'fa fa-institution'
			)
		);
		
		$panel_design_style = wanderers_mkdf_add_admin_panel(
			array(
				'page'  => '',
				'name'  => 'panel_design_style',
				'title' => esc_html__( 'Design Style', 'wanderers' )
			)
		);
		
		wanderers_mkdf_add_admin_field(
			array(
				'name'          => 'google_fonts',
				'type'          => 'font',
				'default_value' => '-1',
				'label'         => esc_html__( 'Google Font Family', 'wanderers' ),
				'description'   => esc_html__( 'Choose a default Google font for your site', 'wanderers' ),
				'parent'        => $panel_design_style
			)
		);
		
		wanderers_mkdf_add_admin_field(
			array(
				'name'          => 'additional_google_fonts',
				'type'          => 'yesno',
				'default_value' => 'no',
				'label'         => esc_html__( 'Additional Google Fonts', 'wanderers' ),
				'parent'        => $panel_design_style
			)
		);
		
		$additional_google_fonts_container = wanderers_mkdf_add_admin_container(
			array(
				'parent'          => $panel_design_style,
				'name'            => 'additional_google_fonts_container',
				'dependency' => array(
					'show' => array(
						'additional_google_fonts'  => 'yes'
					)
				)
			)
		);
		
		wanderers_mkdf_add_admin_field(
			array(
				'name'          => 'additional_google_font1',
				'type'          => 'font',
				'default_value' => '-1',
				'label'         => esc_html__( 'Font Family', 'wanderers' ),
				'description'   => esc_html__( 'Choose additional Google font for your site', 'wanderers' ),
				'parent'        => $additional_google_fonts_container
			)
		);
		
		wanderers_mkdf_add_admin_field(
			array(
				'name'          => 'additional_google_font2',
				'type'          => 'font',
				'default_value' => '-1',
				'label'         => esc_html__( 'Font Family', 'wanderers' ),
				'description'   => esc_html__( 'Choose additional Google font for your site', 'wanderers' ),
				'parent'        => $additional_google_fonts_container
			)
		);
		
		wanderers_mkdf_add_admin_field(
			array(
				'name'          => 'additional_google_font3',
				'type'          => 'font',
				'default_value' => '-1',
				'label'         => esc_html__( 'Font Family', 'wanderers' ),
				'description'   => esc_html__( 'Choose additional Google font for your site', 'wanderers' ),
				'parent'        => $additional_google_fonts_container
			)
		);
		
		wanderers_mkdf_add_admin_field(
			array(
				'name'          => 'additional_google_font4',
				'type'          => 'font',
				'default_value' => '-1',
				'label'         => esc_html__( 'Font Family', 'wanderers' ),
				'description'   => esc_html__( 'Choose additional Google font for your site', 'wanderers' ),
				'parent'        => $additional_google_fonts_container
			)
		);
		
		wanderers_mkdf_add_admin_field(
			array(
				'name'          => 'additional_google_font5',
				'type'          => 'font',
				'default_value' => '-1',
				'label'         => esc_html__( 'Font Family', 'wanderers' ),
				'description'   => esc_html__( 'Choose additional Google font for your site', 'wanderers' ),
				'parent'        => $additional_google_fonts_container
			)
		);
		
		wanderers_mkdf_add_admin_field(
			array(
				'name'          => 'google_font_weight',
				'type'          => 'checkboxgroup',
				'default_value' => '',
				'label'         => esc_html__( 'Google Fonts Style & Weight', 'wanderers' ),
				'description'   => esc_html__( 'Choose a default Google font weights for your site. Impact on page load time', 'wanderers' ),
				'parent'        => $panel_design_style,
				'options'       => array(
					'100'  => esc_html__( '100 Thin', 'wanderers' ),
					'100i' => esc_html__( '100 Thin Italic', 'wanderers' ),
					'200'  => esc_html__( '200 Extra-Light', 'wanderers' ),
					'200i' => esc_html__( '200 Extra-Light Italic', 'wanderers' ),
					'300'  => esc_html__( '300 Light', 'wanderers' ),
					'300i' => esc_html__( '300 Light Italic', 'wanderers' ),
					'400'  => esc_html__( '400 Regular', 'wanderers' ),
					'400i' => esc_html__( '400 Regular Italic', 'wanderers' ),
					'500'  => esc_html__( '500 Medium', 'wanderers' ),
					'500i' => esc_html__( '500 Medium Italic', 'wanderers' ),
					'600'  => esc_html__( '600 Semi-Bold', 'wanderers' ),
					'600i' => esc_html__( '600 Semi-Bold Italic', 'wanderers' ),
					'700'  => esc_html__( '700 Bold', 'wanderers' ),
					'700i' => esc_html__( '700 Bold Italic', 'wanderers' ),
					'800'  => esc_html__( '800 Extra-Bold', 'wanderers' ),
					'800i' => esc_html__( '800 Extra-Bold Italic', 'wanderers' ),
					'900'  => esc_html__( '900 Ultra-Bold', 'wanderers' ),
					'900i' => esc_html__( '900 Ultra-Bold Italic', 'wanderers' )
				)
			)
		);
		
		wanderers_mkdf_add_admin_field(
			array(
				'name'          => 'google_font_subset',
				'type'          => 'checkboxgroup',
				'default_value' => '',
				'label'         => esc_html__( 'Google Fonts Subset', 'wanderers' ),
				'description'   => esc_html__( 'Choose a default Google font subsets for your site', 'wanderers' ),
				'parent'        => $panel_design_style,
				'options'       => array(
					'latin'        => esc_html__( 'Latin', 'wanderers' ),
					'latin-ext'    => esc_html__( 'Latin Extended', 'wanderers' ),
					'cyrillic'     => esc_html__( 'Cyrillic', 'wanderers' ),
					'cyrillic-ext' => esc_html__( 'Cyrillic Extended', 'wanderers' ),
					'greek'        => esc_html__( 'Greek', 'wanderers' ),
					'greek-ext'    => esc_html__( 'Greek Extended', 'wanderers' ),
					'vietnamese'   => esc_html__( 'Vietnamese', 'wanderers' )
				)
			)
		);
		
		wanderers_mkdf_add_admin_field(
			array(
				'name'        => 'first_color',
				'type'        => 'color',
				'label'       => esc_html__( 'First Main Color', 'wanderers' ),
				'description' => esc_html__( 'Choose the most dominant theme color. Default color is #00bbb3', 'wanderers' ),
				'parent'      => $panel_design_style
			)
		);
		
		wanderers_mkdf_add_admin_field(
			array(
				'name'        => 'page_background_color',
				'type'        => 'color',
				'label'       => esc_html__( 'Page Background Color', 'wanderers' ),
				'description' => esc_html__( 'Choose the background color for page content. Default color is #ffffff', 'wanderers' ),
				'parent'      => $panel_design_style
			)
		);
		
		wanderers_mkdf_add_admin_field(
			array(
				'name'        => 'selection_color',
				'type'        => 'color',
				'label'       => esc_html__( 'Text Selection Color', 'wanderers' ),
				'description' => esc_html__( 'Choose the color users see when selecting text', 'wanderers' ),
				'parent'      => $panel_design_style
			)
		);
		
		/***************** Passepartout Layout - begin **********************/
		
		wanderers_mkdf_add_admin_field(
			array(
				'name'          => 'boxed',
				'type'          => 'yesno',
				'default_value' => 'no',
				'label'         => esc_html__( 'Boxed Layout', 'wanderers' ),
				'parent'        => $panel_design_style
			)
		);
		
			$boxed_container = wanderers_mkdf_add_admin_container(
				array(
					'parent'          => $panel_design_style,
					'name'            => 'boxed_container',
					'dependency' => array(
						'show' => array(
							'boxed'  => 'yes'
						)
					)
				)
			);
		
				wanderers_mkdf_add_admin_field(
					array(
						'name'        => 'page_background_color_in_box',
						'type'        => 'color',
						'label'       => esc_html__( 'Page Background Color', 'wanderers' ),
						'description' => esc_html__( 'Choose the page background color outside box', 'wanderers' ),
						'parent'      => $boxed_container
					)
				);
				
				wanderers_mkdf_add_admin_field(
					array(
						'name'        => 'boxed_background_image',
						'type'        => 'image',
						'label'       => esc_html__( 'Background Image', 'wanderers' ),
						'description' => esc_html__( 'Choose an image to be displayed in background', 'wanderers' ),
						'parent'      => $boxed_container
					)
				);
				
				wanderers_mkdf_add_admin_field(
					array(
						'name'        => 'boxed_pattern_background_image',
						'type'        => 'image',
						'label'       => esc_html__( 'Background Pattern', 'wanderers' ),
						'description' => esc_html__( 'Choose an image to be used as background pattern', 'wanderers' ),
						'parent'      => $boxed_container
					)
				);
				
				wanderers_mkdf_add_admin_field(
					array(
						'name'          => 'boxed_background_image_attachment',
						'type'          => 'select',
						'default_value' => '',
						'label'         => esc_html__( 'Background Image Attachment', 'wanderers' ),
						'description'   => esc_html__( 'Choose background image attachment', 'wanderers' ),
						'parent'        => $boxed_container,
						'options'       => array(
							''       => esc_html__( 'Default', 'wanderers' ),
							'fixed'  => esc_html__( 'Fixed', 'wanderers' ),
							'scroll' => esc_html__( 'Scroll', 'wanderers' )
						)
					)
				);
		
		/***************** Boxed Layout - end **********************/
		
		/***************** Passepartout Layout - begin **********************/
		
		wanderers_mkdf_add_admin_field(
			array(
				'name'          => 'paspartu',
				'type'          => 'yesno',
				'default_value' => 'no',
				'label'         => esc_html__( 'Passepartout', 'wanderers' ),
				'description'   => esc_html__( 'Enabling this option will display passepartout around site content', 'wanderers' ),
				'parent'        => $panel_design_style
			)
		);
		
			$paspartu_container = wanderers_mkdf_add_admin_container(
				array(
					'parent'          => $panel_design_style,
					'name'            => 'paspartu_container',
					'dependency' => array(
						'show' => array(
							'paspartu'  => 'yes'
						)
					)
				)
			);
		
				wanderers_mkdf_add_admin_field(
					array(
						'name'        => 'paspartu_color',
						'type'        => 'color',
						'label'       => esc_html__( 'Passepartout Color', 'wanderers' ),
						'description' => esc_html__( 'Choose passepartout color, default value is #ffffff', 'wanderers' ),
						'parent'      => $paspartu_container
					)
				);
				
				wanderers_mkdf_add_admin_field(
					array(
						'name'        => 'paspartu_width',
						'type'        => 'text',
						'label'       => esc_html__( 'Passepartout Size', 'wanderers' ),
						'description' => esc_html__( 'Enter size amount for passepartout', 'wanderers' ),
						'parent'      => $paspartu_container,
						'args'        => array(
							'col_width' => 2,
							'suffix'    => 'px or %'
						)
					)
				);
		
				wanderers_mkdf_add_admin_field(
					array(
						'name'        => 'paspartu_responsive_width',
						'type'        => 'text',
						'label'       => esc_html__( 'Responsive Passepartout Size', 'wanderers' ),
						'description' => esc_html__( 'Enter size amount for passepartout for smaller screens (tablets and mobiles view)', 'wanderers' ),
						'parent'      => $paspartu_container,
						'args'        => array(
							'col_width' => 2,
							'suffix'    => 'px or %'
						)
					)
				);
				
				wanderers_mkdf_add_admin_field(
					array(
						'parent'        => $paspartu_container,
						'type'          => 'yesno',
						'default_value' => 'no',
						'name'          => 'disable_top_paspartu',
						'label'         => esc_html__( 'Disable Top Passepartout', 'wanderers' )
					)
				);
		
				wanderers_mkdf_add_admin_field(
					array(
						'parent'        => $paspartu_container,
						'type'          => 'yesno',
						'default_value' => 'no',
						'name'          => 'enable_fixed_paspartu',
						'label'         => esc_html__( 'Enable Fixed Passepartout', 'wanderers' ),
						'description' => esc_html__( 'Enabling this option will set fixed passepartout for your screens', 'wanderers' )
					)
				);
		
		/***************** Passepartout Layout - end **********************/
		
		/***************** Content Layout - begin **********************/
		
		wanderers_mkdf_add_admin_field(
			array(
				'name'          => 'initial_content_width',
				'type'          => 'select',
				'default_value' => 'mkdf-grid-1300',
				'label'         => esc_html__( 'Initial Width of Content', 'wanderers' ),
				'description'   => esc_html__( 'Choose the initial width of content which is in grid (Applies to pages set to "Default Template" and rows set to "In Grid")', 'wanderers' ),
				'parent'        => $panel_design_style,
				'options'       => array(
                    'mkdf-grid-1300' => esc_html__( '1300px - default', 'wanderers' ),
					'mkdf-grid-1100' => esc_html__( '1100px', 'wanderers' ),
					'mkdf-grid-1200' => esc_html__( '1200px', 'wanderers' ),
					'mkdf-grid-1000' => esc_html__( '1000px', 'wanderers' ),
					'mkdf-grid-800'  => esc_html__( '800px', 'wanderers' )
				)
			)
		);
		
		wanderers_mkdf_add_admin_field(
			array(
				'name'          => 'preload_pattern_image',
				'type'          => 'image',
				'label'         => esc_html__( 'Preload Pattern Image', 'wanderers' ),
				'description'   => esc_html__( 'Choose preload pattern image to be displayed until images are loaded', 'wanderers' ),
				'parent'        => $panel_design_style
			)
		);
		
		/***************** Content Layout - end **********************/
		
		$panel_settings = wanderers_mkdf_add_admin_panel(
			array(
				'page'  => '',
				'name'  => 'panel_settings',
				'title' => esc_html__( 'Settings', 'wanderers' )
			)
		);
		
		/***************** Smooth Scroll Layout - begin **********************/
		
		wanderers_mkdf_add_admin_field(
			array(
				'name'          => 'page_smooth_scroll',
				'type'          => 'yesno',
				'default_value' => 'no',
				'label'         => esc_html__( 'Smooth Scroll', 'wanderers' ),
				'description'   => esc_html__( 'Enabling this option will perform a smooth scrolling effect on every page (except on Mac and touch devices)', 'wanderers' ),
				'parent'        => $panel_settings
			)
		);
		
		/***************** Smooth Scroll Layout - end **********************/
		
		/***************** Smooth Page Transitions Layout - begin **********************/
		
		wanderers_mkdf_add_admin_field(
			array(
				'name'          => 'smooth_page_transitions',
				'type'          => 'yesno',
				'default_value' => 'no',
				'label'         => esc_html__( 'Smooth Page Transitions', 'wanderers' ),
				'description'   => esc_html__( 'Enabling this option will perform a smooth transition between pages when clicking on links', 'wanderers' ),
				'parent'        => $panel_settings
			)
		);
		
			$page_transitions_container = wanderers_mkdf_add_admin_container(
				array(
					'parent'          => $panel_settings,
					'name'            => 'page_transitions_container',
					'dependency' => array(
						'show' => array(
							'smooth_page_transitions'  => 'yes'
						)
					)
				)
			);
		
				wanderers_mkdf_add_admin_field(
					array(
						'name'          => 'page_transition_preloader',
						'type'          => 'yesno',
						'default_value' => 'no',
						'label'         => esc_html__( 'Enable Preloading Animation', 'wanderers' ),
						'description'   => esc_html__( 'Enabling this option will display an animated preloader while the page content is loading', 'wanderers' ),
						'parent'        => $page_transitions_container
					)
				);
				
				$page_transition_preloader_container = wanderers_mkdf_add_admin_container(
					array(
						'parent'          => $page_transitions_container,
						'name'            => 'page_transition_preloader_container',
						'dependency' => array(
							'show' => array(
								'page_transition_preloader'  => 'yes'
							)
						)
					)
				);
		
		
					wanderers_mkdf_add_admin_field(
						array(
							'name'   => 'smooth_pt_bgnd_color',
							'type'   => 'color',
							'label'  => esc_html__( 'Page Loader Background Color', 'wanderers' ),
							'parent' => $page_transition_preloader_container
						)
					);
					
					$group_pt_spinner_animation = wanderers_mkdf_add_admin_group(
						array(
							'name'        => 'group_pt_spinner_animation',
							'title'       => esc_html__( 'Loader Style', 'wanderers' ),
							'description' => esc_html__( 'Define styles for loader spinner animation', 'wanderers' ),
							'parent'      => $page_transition_preloader_container
						)
					);
					
					$row_pt_spinner_animation = wanderers_mkdf_add_admin_row(
						array(
							'name'   => 'row_pt_spinner_animation',
							'parent' => $group_pt_spinner_animation
						)
					);
					
					wanderers_mkdf_add_admin_field(
						array(
							'type'          => 'selectsimple',
							'name'          => 'smooth_pt_spinner_type',
							'default_value' => '',
							'label'         => esc_html__( 'Spinner Type', 'wanderers' ),
							'parent'        => $row_pt_spinner_animation,
							'options'       => array(
								'wanderer_loader'       => esc_html__( 'Wanderer Loader', 'wanderers' ),
								'rotate_circles'        => esc_html__( 'Rotate Circles', 'wanderers' ),
								'pulse'                 => esc_html__( 'Pulse', 'wanderers' ),
								'double_pulse'          => esc_html__( 'Double Pulse', 'wanderers' ),
								'cube'                  => esc_html__( 'Cube', 'wanderers' ),
								'rotating_cubes'        => esc_html__( 'Rotating Cubes', 'wanderers' ),
								'stripes'               => esc_html__( 'Stripes', 'wanderers' ),
								'wave'                  => esc_html__( 'Wave', 'wanderers' ),
								'two_rotating_circles'  => esc_html__( '2 Rotating Circles', 'wanderers' ),
								'five_rotating_circles' => esc_html__( '5 Rotating Circles', 'wanderers' ),
								'atom'                  => esc_html__( 'Atom', 'wanderers' ),
								'clock'                 => esc_html__( 'Clock', 'wanderers' ),
								'mitosis'               => esc_html__( 'Mitosis', 'wanderers' ),
								'lines'                 => esc_html__( 'Lines', 'wanderers' ),
								'fussion'               => esc_html__( 'Fussion', 'wanderers' ),
								'wave_circles'          => esc_html__( 'Wave Circles', 'wanderers' ),
								'pulse_circles'         => esc_html__( 'Pulse Circles', 'wanderers' )
							)
						)
					);
					
					wanderers_mkdf_add_admin_field(
						array(
							'type'          => 'colorsimple',
							'name'          => 'smooth_pt_spinner_color',
							'default_value' => '',
							'label'         => esc_html__( 'Spinner Color', 'wanderers' ),
							'parent'        => $row_pt_spinner_animation
						)
					);

					wanderers_mkdf_add_admin_field(
			            array(
			                'type' => 'textarea',
			                'name' => 'smooth_pt_svg',
			                'default_value' => '',
			                'parent' => $page_transitions_container,
			                'label' => esc_html__( 'Spinner SVG Code', 'wanderers' ),
			                'dependency' => array(
			                    'show' => array(
			                        'smooth_pt_spinner_type' => 'wanderer_loader'
			                    )
			                )
			            )
			        );
					
					wanderers_mkdf_add_admin_field(
						array(
							'name'          => 'page_transition_fadeout',
							'type'          => 'yesno',
							'default_value' => 'no',
							'label'         => esc_html__( 'Enable Fade Out Animation', 'wanderers' ),
							'description'   => esc_html__( 'Enabling this option will turn on fade out animation when leaving page', 'wanderers' ),
							'parent'        => $page_transitions_container
						)
					);
		
		/***************** Smooth Page Transitions Layout - end **********************/
		
		wanderers_mkdf_add_admin_field(
			array(
				'name'          => 'show_back_button',
				'type'          => 'yesno',
				'default_value' => 'yes',
				'label'         => esc_html__( 'Show "Back To Top Button"', 'wanderers' ),
				'description'   => esc_html__( 'Enabling this option will display a Back to Top button on every page', 'wanderers' ),
				'parent'        => $panel_settings
			)
		);
		
		wanderers_mkdf_add_admin_field(
			array(
				'name'          => 'responsiveness',
				'type'          => 'yesno',
				'default_value' => 'yes',
				'label'         => esc_html__( 'Responsiveness', 'wanderers' ),
				'description'   => esc_html__( 'Enabling this option will make all pages responsive', 'wanderers' ),
				'parent'        => $panel_settings
			)
		);
		
		$panel_custom_code = wanderers_mkdf_add_admin_panel(
			array(
				'page'  => '',
				'name'  => 'panel_custom_code',
				'title' => esc_html__( 'Custom Code', 'wanderers' )
			)
		);
		
		wanderers_mkdf_add_admin_field(
			array(
				'name'        => 'custom_js',
				'type'        => 'textarea',
				'label'       => esc_html__( 'Custom JS', 'wanderers' ),
				'description' => esc_html__( 'Enter your custom Javascript here', 'wanderers' ),
				'parent'      => $panel_custom_code
			)
		);
		
		$panel_google_api = wanderers_mkdf_add_admin_panel(
			array(
				'page'  => '',
				'name'  => 'panel_google_api',
				'title' => esc_html__( 'Google API', 'wanderers' )
			)
		);
		
		wanderers_mkdf_add_admin_field(
			array(
				'name'        => 'google_maps_api_key',
				'type'        => 'text',
				'label'       => esc_html__( 'Google Maps Api Key', 'wanderers' ),
				'description' => esc_html__( 'Insert your Google Maps API key here. For instructions on how to create a Google Maps API key, please refer to our to our documentation.', 'wanderers' ),
				'parent'      => $panel_google_api
			)
		);

		if(defined('MIKADO_MEMBERSHIP_VERSION')){

            $membership_panel = wanderers_mkdf_add_admin_panel(
                array(
                    'page'  => '',
                    'name'  => 'panel_membership_login',
                    'title' => esc_html__( 'Membership Login', 'wanderers' )
                )
            );

            wanderers_mkdf_add_admin_field(
                array(
                    'name'        => 'membership_login_title',
                    'type'        => 'text',
                    'label'       => esc_html__( 'Membership Login Title', 'wanderers' ),
                    'description' => esc_html__( 'Insert the title that will be shown inside the login/register popup', 'wanderers' ),
                    'parent'      => $membership_panel
                )
            );

        }

	}
	
	add_action( 'wanderers_mkdf_options_map', 'wanderers_mkdf_general_options_map', 1 );
}

if ( ! function_exists( 'wanderers_mkdf_page_general_style' ) ) {
	/**
	 * Function that prints page general inline styles
	 */
	function wanderers_mkdf_page_general_style( $style ) {
		$current_style = '';
		$page_id       = wanderers_mkdf_get_page_id();
		$class_prefix  = wanderers_mkdf_get_unique_page_class( $page_id );
		
		$boxed_background_style = array();
		
		$boxed_page_background_color = wanderers_mkdf_get_meta_field_intersect( 'page_background_color_in_box', $page_id );
		if ( ! empty( $boxed_page_background_color ) ) {
			$boxed_background_style['background-color'] = $boxed_page_background_color;
		}
		
		$boxed_page_background_image = wanderers_mkdf_get_meta_field_intersect( 'boxed_background_image', $page_id );
		if ( ! empty( $boxed_page_background_image ) ) {
			$boxed_background_style['background-image']    = 'url(' . esc_url( $boxed_page_background_image ) . ')';
			$boxed_background_style['background-position'] = 'center 0px';
			$boxed_background_style['background-repeat']   = 'no-repeat';
		}
		
		$boxed_page_background_pattern_image = wanderers_mkdf_get_meta_field_intersect( 'boxed_pattern_background_image', $page_id );
		if ( ! empty( $boxed_page_background_pattern_image ) ) {
			$boxed_background_style['background-image']    = 'url(' . esc_url( $boxed_page_background_pattern_image ) . ')';
			$boxed_background_style['background-position'] = '0px 0px';
			$boxed_background_style['background-repeat']   = 'repeat';
		}
		
		$boxed_page_background_attachment = wanderers_mkdf_get_meta_field_intersect( 'boxed_background_image_attachment', $page_id );
		if ( ! empty( $boxed_page_background_attachment ) ) {
			$boxed_background_style['background-attachment'] = $boxed_page_background_attachment;
		}
		
		$boxed_background_selector = $class_prefix . '.mkdf-boxed .mkdf-wrapper';
		
		if ( ! empty( $boxed_background_style ) ) {
			$current_style .= wanderers_mkdf_dynamic_css( $boxed_background_selector, $boxed_background_style );
		}
		
		$paspartu_style     = array();
		$paspartu_res_style = array();
		$paspartu_res_start = '@media only screen and (max-width: 1024px) {';
		$paspartu_res_end   = '}';
		
		$paspartu_header_selector                = array(
			'.mkdf-paspartu-enabled .mkdf-page-header .mkdf-fixed-wrapper.fixed',
			'.mkdf-paspartu-enabled .mkdf-sticky-header',
			'.mkdf-paspartu-enabled .mkdf-mobile-header.mobile-header-appear .mkdf-mobile-header-inner'
		);
		$paspartu_header_appear_selector         = array(
			'.mkdf-paspartu-enabled.mkdf-fixed-paspartu-enabled .mkdf-page-header .mkdf-fixed-wrapper.fixed',
			'.mkdf-paspartu-enabled.mkdf-fixed-paspartu-enabled .mkdf-sticky-header.header-appear',
			'.mkdf-paspartu-enabled.mkdf-fixed-paspartu-enabled .mkdf-mobile-header.mobile-header-appear .mkdf-mobile-header-inner'
		);
		
		$paspartu_header_style                   = array();
		$paspartu_header_appear_style            = array();
		$paspartu_header_responsive_style        = array();
		$paspartu_header_appear_responsive_style = array();
		
		$paspartu_color = wanderers_mkdf_get_meta_field_intersect( 'paspartu_color', $page_id );
		if ( ! empty( $paspartu_color ) ) {
			$paspartu_style['background-color'] = $paspartu_color;
		}
		
		$paspartu_width = wanderers_mkdf_get_meta_field_intersect( 'paspartu_width', $page_id );
		if ( $paspartu_width !== '' ) {
			if ( wanderers_mkdf_string_ends_with( $paspartu_width, '%' ) || wanderers_mkdf_string_ends_with( $paspartu_width, 'px' ) ) {
				$paspartu_style['padding'] = $paspartu_width;
				
				$paspartu_clean_width      = wanderers_mkdf_string_ends_with( $paspartu_width, '%' ) ? wanderers_mkdf_filter_suffix( $paspartu_width, '%' ) : wanderers_mkdf_filter_suffix( $paspartu_width, 'px' );
				$paspartu_clean_width_mark = wanderers_mkdf_string_ends_with( $paspartu_width, '%' ) ? '%' : 'px';
				
				$paspartu_header_style['left']              = $paspartu_width;
				$paspartu_header_style['width']             = 'calc(100% - ' . ( 2 * $paspartu_clean_width ) . $paspartu_clean_width_mark . ')';
				$paspartu_header_appear_style['margin-top'] = $paspartu_width;
			} else {
				$paspartu_style['padding'] = $paspartu_width . 'px';
				
				$paspartu_header_style['left']              = $paspartu_width . 'px';
				$paspartu_header_style['width']             = 'calc(100% - ' . ( 2 * $paspartu_width ) . 'px)';
				$paspartu_header_appear_style['margin-top'] = $paspartu_width . 'px';
			}
		}
		
		$paspartu_selector = $class_prefix . '.mkdf-paspartu-enabled .mkdf-wrapper';
		
		if ( ! empty( $paspartu_style ) ) {
			$current_style .= wanderers_mkdf_dynamic_css( $paspartu_selector, $paspartu_style );
		}
		
		if ( ! empty( $paspartu_header_style ) ) {
			$current_style .= wanderers_mkdf_dynamic_css( $paspartu_header_selector, $paspartu_header_style );
			$current_style .= wanderers_mkdf_dynamic_css( $paspartu_header_appear_selector, $paspartu_header_appear_style );
		}
		
		$paspartu_responsive_width = wanderers_mkdf_get_meta_field_intersect( 'paspartu_responsive_width', $page_id );
		if ( $paspartu_responsive_width !== '' ) {
			if ( wanderers_mkdf_string_ends_with( $paspartu_responsive_width, '%' ) || wanderers_mkdf_string_ends_with( $paspartu_responsive_width, 'px' ) ) {
				$paspartu_res_style['padding'] = $paspartu_responsive_width;
				
				$paspartu_clean_width      = wanderers_mkdf_string_ends_with( $paspartu_responsive_width, '%' ) ? wanderers_mkdf_filter_suffix( $paspartu_responsive_width, '%' ) : wanderers_mkdf_filter_suffix( $paspartu_responsive_width, 'px' );
				$paspartu_clean_width_mark = wanderers_mkdf_string_ends_with( $paspartu_responsive_width, '%' ) ? '%' : 'px';
				
				$paspartu_header_responsive_style['left']              = $paspartu_width;
				$paspartu_header_responsive_style['width']             = 'calc(100% - ' . ( 2 * $paspartu_clean_width ) . $paspartu_clean_width_mark . ')';
				$paspartu_header_appear_responsive_style['margin-top'] = $paspartu_width;
			} else {
				$paspartu_res_style['padding'] = $paspartu_responsive_width . 'px';
				
				$paspartu_header_responsive_style['left']              = $paspartu_width . 'px';
				$paspartu_header_responsive_style['width']             = 'calc(100% - ' . ( 2 * $paspartu_width ) . 'px)';
				$paspartu_header_appear_responsive_style['margin-top'] = $paspartu_width . 'px';
			}
		}
		
		if ( ! empty( $paspartu_res_style ) ) {
			$current_style .= $paspartu_res_start . wanderers_mkdf_dynamic_css( $paspartu_selector, $paspartu_res_style ) . $paspartu_res_end;
		}
		
		if ( ! empty( $paspartu_header_responsive_style ) ) {
			$current_style .= $paspartu_res_start . wanderers_mkdf_dynamic_css( $paspartu_header_selector, $paspartu_header_responsive_style ) . $paspartu_res_end;
			$current_style .= $paspartu_res_start . wanderers_mkdf_dynamic_css( $paspartu_header_appear_selector, $paspartu_header_appear_responsive_style ) . $paspartu_res_end;
		}
		
		$current_style = $current_style . $style;
		
		return $current_style;
	}
	
	add_filter( 'wanderers_mkdf_add_page_custom_style', 'wanderers_mkdf_page_general_style' );
}