<?php
if ( class_exists( 'WanderersCoreClassWidget' ) ) {
	
	class WanderersMkdfTourListWidget extends WanderersCoreClassWidget {
		public function __construct() {
			parent::__construct(
				'mkdf_tour_list_widget',
				esc_html__( 'Mikado Tour List Widget', 'mkdf-tours' ),
				array( 'description' => esc_html__( 'Display list of your tours', 'mkdf-tours' ) )
			);
			
			$this->setParams();
		}
		
		/**
		 * Sets widget options
		 */
		protected function setParams() {
			$this->params = array(
				array(
					'type'  => 'textfield',
					'name'  => 'widget_title',
					'title' => esc_html__( 'Widget Title', 'mkdf-tours' )
				),
				array(
					'type'  => 'textfield',
					'name'  => 'number',
					'title' => esc_html__( 'Number of Posts', 'mkdf-tours' )
				),
				array(
					'type'        => 'textfield',
					'name'        => 'tour_category',
					'title'       => esc_html__( 'Category Slug', 'mkdf-tours' ),
					'description' => esc_html__( 'Leave empty for all or use comma for list', 'mkdf-tours' )
				),
				array(
					'type'    => 'dropdown',
					'name'    => 'order_by',
					'title'   => esc_html__( 'Order By', 'mkdf-tours' ),
					'options' => wanderers_mkdf_get_query_order_by_array()
				),
				array(
					'type'    => 'dropdown',
					'name'    => 'order',
					'title'   => esc_html__( 'Order', 'mkdf-tours' ),
					'options' => wanderers_mkdf_get_query_order_array()
				),
				array(
					'type'    => 'dropdown',
					'name'    => 'title_tag',
					'title'   => esc_html__( 'Title Tag', 'mkdf-tours' ),
					'options' => wanderers_mkdf_get_title_tag( true )
				),
			);
		}
		
		/**
		 * Generates widget's HTML
		 *
		 * @param array $args args from widget area
		 * @param array $instance widget's options
		 */
		public function widget( $args, $instance ) {
			if ( ! is_array( $instance ) ) {
				$instance = array();
			}
			
			$instance['tour_type']           = 'standard';
			$instance['space_between_items'] = 'small';
			$instance['tour_item']           = '1';
			$instance['image_size']          = 'thumbnail';
			
			// Filter out all empty params
			$instance = array_filter( $instance, function ( $array_value ) {
				return trim( $array_value ) != '';
			} );
			
			$params = '';
			//generate shortcode params
			foreach ( $instance as $key => $value ) {
				$params .= " $key='$value' ";
			}
			
			echo '<div class="widget mkdf-tour-list-widget">';
			if ( ! empty( $instance['widget_title'] ) ) {
				echo wp_kses_post( $args['before_title'] ) . esc_html( $instance['widget_title'] ) . wp_kses_post( $args['after_title'] );
			}
			
			echo do_shortcode( "[mkdf_tours_list $params]" ); // XSS OK
			echo '</div>';
		}
	}
}