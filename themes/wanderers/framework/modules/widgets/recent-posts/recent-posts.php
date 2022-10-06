<?php
if ( class_exists( 'WanderersCoreClassWidget' ) ) {
	
	class WanderersMkdfRecentPosts extends WanderersCoreClassWidget {
		public function __construct() {
			parent::__construct(
				'mkdf_recent_posts',
				esc_html__( 'Mikado Recent Posts', 'wanderers' ),
				array( 'description' => esc_html__( 'Select recent posts that you would like to display', 'wanderers' ) )
			);
			
			$this->setParams();
		}
		
		protected function setParams() {
			$post_types = apply_filters( 'wanderers_mkdf_search_post_type_widget_params_post_type', array( 'post' => 'Post' ) );
			
			$this->params = array(
				array(
					'type'  => 'textfield',
					'name'  => 'widget_title',
					'title' => esc_html__( 'Widget Title', 'wanderers' )
				),
				array(
					'type'        => 'dropdown',
					'name'        => 'post_type',
					'title'       => esc_html__( 'Post Type', 'wanderers' ),
					'description' => esc_html__( 'Choose post type that you want to be searched for', 'wanderers' ),
					'options'     => $post_types
				),
				array(
					'type'    => 'dropdown',
					'name'    => 'title_tag',
					'title'   => esc_html__( 'Title Tag', 'wanderers' ),
					'options' => wanderers_mkdf_get_title_tag( true, array( 'p' => 'p' ) )
				)
			);
		}
		
		public function widget( $args, $instance ) {
			
			if ( ! is_array( $instance ) ) {
				$instance = array();
			}
			
			if ( $instance['post_type'] !== '' ) {
				$type = $instance['post_type'];
			} else {
				$type = 'post';
			}
			
			if ( empty( $instance['title_tag'] ) ) {
				$instance['title_tag'] = 'h6';
			}
			
			$params = array(
				'post_type'      => $type,
				'post_status'    => 'publish',
				'order'          => 'DESC',
				'orderby'        => 'date',
				'posts_per_page' => 4
			);
			
			$query = new WP_Query( $params );
			
			$html = '';
			$html .= '<div class="widget mkdf-recent-post-widget">';
			
			if ( ! empty( $instance['widget_title'] ) ) {
				$html .= wp_kses_post( $args['before_title'] ) . esc_html( $instance['widget_title'] ) . wp_kses_post( $args['after_title'] );
			}
			
			if ( $query->have_posts() ) {
				$html .= '<ul class="mkdf-recent-posts">';
				while ( $query->have_posts() ) {
					$query->the_post();
					$html .= '<li class="mkdf-rp-item"><a href="' . get_the_permalink() . '"><div class="mkdf-rp-image">' . get_the_post_thumbnail( get_the_ID(), array(
							56,
							56
						) ) . '</div><' . $instance['title_tag'] . ' class="mkdf-rp-title">' . get_the_title() . '</' . $instance['title_tag'] . '></a></li>';
				}
				$html .= '</ul>';
			} else {
				$html .= esc_html__( 'Sorry, there are no posts matching your criteria', 'wanderers' );
			}
			
			$html .= '</div>';
			
			wp_reset_postdata();
			
			print wanderers_mkdf_display_content_output( $html );
		}
	}
}