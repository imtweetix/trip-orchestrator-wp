<?php
if ( class_exists( 'WanderersCoreClassWidget' ) ) {
	
	class WanderersMkdfButtonWidget extends WanderersCoreClassWidget {
		public function __construct() {
			parent::__construct(
				'mkdf_button_widget',
				esc_html__( 'Mikado Button Widget', 'wanderers' ),
				array( 'description' => esc_html__( 'Add button element to widget areas', 'wanderers' ) )
			);
			
			$this->setParams();
		}
		
		protected function setParams() {
			$this->params = array(
				array(
					'type'    => 'dropdown',
					'name'    => 'type',
					'title'   => esc_html__( 'Type', 'wanderers' ),
					'options' => array(
						'solid'   => esc_html__( 'Solid', 'wanderers' ),
						'outline' => esc_html__( 'Outline', 'wanderers' ),
						'simple'  => esc_html__( 'Simple', 'wanderers' )
					)
				),
				array(
					'type'        => 'dropdown',
					'name'        => 'size',
					'title'       => esc_html__( 'Size', 'wanderers' ),
					'options'     => array(
						'small'  => esc_html__( 'Small', 'wanderers' ),
						'medium' => esc_html__( 'Medium', 'wanderers' ),
						'large'  => esc_html__( 'Large', 'wanderers' ),
						'huge'   => esc_html__( 'Huge', 'wanderers' )
					),
					'description' => esc_html__( 'This option is only available for solid and outline button type', 'wanderers' )
				),
				array(
					'type'    => 'textfield',
					'name'    => 'text',
					'title'   => esc_html__( 'Text', 'wanderers' ),
					'default' => esc_html__( 'Button Text', 'wanderers' )
				),
				array(
					'type'  => 'textfield',
					'name'  => 'link',
					'title' => esc_html__( 'Link', 'wanderers' )
				),
				array(
					'type'    => 'dropdown',
					'name'    => 'target',
					'title'   => esc_html__( 'Link Target', 'wanderers' ),
					'options' => wanderers_mkdf_get_link_target_array()
				),
				array(
					'type'  => 'colorpicker',
					'name'  => 'color',
					'title' => esc_html__( 'Color', 'wanderers' )
				),
				array(
					'type'  => 'colorpicker',
					'name'  => 'hover_color',
					'title' => esc_html__( 'Hover Color', 'wanderers' )
				),
				array(
					'type'        => 'colorpicker',
					'name'        => 'background_color',
					'title'       => esc_html__( 'Background Color', 'wanderers' ),
					'description' => esc_html__( 'This option is only available for solid button type', 'wanderers' )
				),
				array(
					'type'        => 'colorpicker',
					'name'        => 'hover_background_color',
					'title'       => esc_html__( 'Hover Background Color', 'wanderers' ),
					'description' => esc_html__( 'This option is only available for solid button type', 'wanderers' )
				),
				array(
					'type'        => 'colorpicker',
					'name'        => 'border_color',
					'title'       => esc_html__( 'Border Color', 'wanderers' ),
					'description' => esc_html__( 'This option is only available for solid and outline button type', 'wanderers' )
				),
				array(
					'type'        => 'colorpicker',
					'name'        => 'hover_border_color',
					'title'       => esc_html__( 'Hover Border Color', 'wanderers' ),
					'description' => esc_html__( 'This option is only available for solid and outline button type', 'wanderers' )
				),
				array(
					'type'        => 'textfield',
					'name'        => 'margin',
					'title'       => esc_html__( 'Margin', 'wanderers' ),
					'description' => esc_html__( 'Insert margin in format: top right bottom left (e.g. 10px 5px 10px 5px)', 'wanderers' )
				)
			);
		}
		
		public function widget( $args, $instance ) {
			$params = '';
			
			if ( ! is_array( $instance ) ) {
				$instance = array();
			}
			
			// Filter out all empty params
			$instance = array_filter( $instance, function ( $array_value ) {
				return trim( $array_value ) != '';
			} );
			
			// Default values
			if ( ! isset( $instance['text'] ) ) {
				$instance['text'] = 'Button Text';
			}
			
			// Generate shortcode params
			foreach ( $instance as $key => $value ) {
				$params .= " $key='$value' ";
			}
			
			echo '<div class="widget mkdf-button-widget">';
			echo do_shortcode( "[mkdf_button $params]" ); // XSS OK
			echo '</div>';
		}
	}
}