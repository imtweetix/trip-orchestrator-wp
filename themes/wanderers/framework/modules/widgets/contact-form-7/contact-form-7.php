<?php
if ( class_exists( 'WanderersCoreClassWidget' ) ) {
	
	class WanderersMkdfContactForm7Widget extends WanderersCoreClassWidget {
		public function __construct() {
			parent::__construct(
				'mkdf_contact_form_7_widget',
				esc_html__( 'Mikado Contact Form 7 Widget', 'wanderers' ),
				array( 'description' => esc_html__( 'Add contact form 7 to widget areas', 'wanderers' ) )
			);
			
			$this->setParams();
		}
		
		protected function setParams() {
			$cf7 = get_posts( 'post_type="wpcf7_contact_form"&numberposts=-1' );
			
			$contact_forms = array();
			if ( $cf7 ) {
				foreach ( $cf7 as $cform ) {
					$contact_forms[ $cform->ID ] = $cform->post_title;
				}
			} else {
				$contact_forms[0] = esc_html__( 'No contact forms found', 'wanderers' );
			}
			
			$this->params = array(
				array(
					'type'  => 'textfield',
					'name'  => 'extra_class',
					'title' => esc_html__( 'Extra Class Name', 'wanderers' )
				),
				array(
					'type'  => 'textfield',
					'name'  => 'widget_title',
					'title' => esc_html__( 'Widget Title', 'wanderers' )
				),
				array(
					'type'    => 'dropdown',
					'name'    => 'contact_form',
					'title'   => esc_html__( 'Select Contact Form 7', 'wanderers' ),
					'options' => $contact_forms
				),
				array(
					'type'    => 'dropdown',
					'name'    => 'contact_form_style',
					'title'   => esc_html__( 'Contact Form 7 Style', 'wanderers' ),
					'options' => array(
						''                   => esc_html__( 'Default', 'wanderers' ),
						'cf7_custom_style_1' => esc_html__( 'Custom Style 1', 'wanderers' ),
						'cf7_custom_style_2' => esc_html__( 'Custom Style 2', 'wanderers' ),
						'cf7_custom_style_3' => esc_html__( 'Custom Style 3', 'wanderers' ),
						'cf7_custom_style_4' => esc_html__( 'Custom Style 4', 'wanderers' )
					)
				)
			);
		}
		
		public function widget( $args, $instance ) {
			$extra_class = ! empty( $instance['extra_class'] ) ? esc_attr( $instance['extra_class'] ) : '';
			?>
			<div class="widget mkdf-contact-form-7-widget <?php echo esc_attr( $extra_class ); ?>">
				<?php if ( ! empty( $instance['widget_title'] ) ) {
					echo wp_kses_post( $args['before_title'] ) . esc_html( $instance['widget_title'] ) . wp_kses_post( $args['after_title'] );
				} ?>
				<?php if ( ! empty( $instance['contact_form'] ) ) {
					echo do_shortcode( '[contact-form-7 id="' . esc_attr( $instance['contact_form'] ) . '" html_class="' . esc_attr( $instance['contact_form_style'] ) . '"]' );
				} ?>
			</div>
			<?php
		}
	}
}