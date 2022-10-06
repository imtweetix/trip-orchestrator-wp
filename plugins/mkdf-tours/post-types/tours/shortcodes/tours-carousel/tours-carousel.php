<?php
namespace MikadoTours\CPT\Tours\Shortcodes;

use MikadoTours\CPT\Tours\Lib\ToursQuery;
use MikadoTours\Lib\ShortcodeInterface;

class ToursCarousel implements ShortcodeInterface {
	private $base;

	/**
	 * ToursCarousel constructor.
	 */
	public function __construct() {
		$this->base = 'mkdf_tours_carousel';

		add_action('vc_before_init', array($this, 'vcMap'));
	}


	/**
	 * Returns base for shortcode
	 * @return string
	 */
	public function getBase() {
		return $this->base;
	}

	public function vcMap() {
		vc_map(array(
			'name'                      => esc_html__('Mikado Tours Carousel', 'mkdf-tours'),
			'base'                      => $this->base,
			'category'       			=> esc_html__('by MIKADO TOURS', 'mkdf-tours'),
			'icon'                      => 'icon-wpb-tours-carousel extended-custom-tours-icon',
			'allowed_container_element' => 'vc_row',
			'params'                    => array_merge(
				array(
					array(
						'type'        => 'dropdown',
						'heading'     => esc_html__('Tours List Type', 'mkdf-tours'),
						'param_name'  => 'tour_type',
						'value'       => array(
							esc_html__('Standard', 'mkdf-tours') => 'standard',
							esc_html__('Gallery', 'mkdf-tours')  => 'gallery'
						),
						'admin_label' => true,
						'description' => esc_html__('Default value is Standard', 'mkdf-tours'),
					),
					array(
						'type'        => 'dropdown',
						'heading'     => esc_html__('Image Proportions', 'mkdf-tours'),
						'param_name'  => 'image_size',
						'value'       => array(
							esc_html__('Original', 'mkdf-tours')  => 'full',
							esc_html__('Square', 'mkdf-tours')    => 'square',
							esc_html__('Landscape', 'mkdf-tours') => 'landscape',
							esc_html__('Portrait', 'mkdf-tours')  => 'portrait',
							esc_html__('Custom', 'mkdf-tours')    => 'custom'
						)
					),
					array(
						'type'        => 'textfield',
						'heading'     => esc_html__('Image Dimensions', 'mkdf-tours'),
						'param_name'  => 'custom_image_dimensions',
						'description' => esc_html__('Enter custom image dimensions. Enter image size in pixels: 200x100 (Width x Height)', 'mkdf-tours'),
						'dependency'  => array('element' => 'image_size', 'value' => 'custom')
					),
					array(
			            'type' => 'dropdown',
			            'heading' => esc_html__('Space Between Items','mkdf-tours'),
			            'param_name' => 'space_between_items',
			            'value' => array(
			                esc_html__('Medium', 'mkdf-tours') => 'normal',
			                esc_html__('Small', 'mkdf-tours') => 'small',
			                esc_html__('Tiny', 'mkdf-tours') => 'tiny',
			                esc_html__('None', 'mkdf-tours') => 'no',
			            )
		            ),
					array(
						'type'        => 'dropdown',
						'param_name'  => 'title_tag',
						'heading'     => esc_html__( 'Title Tag', 'mkdf-tours' ),
						'value'       => array_flip( wanderers_mkdf_get_title_tag( true ) ),
					),
					array(
						'type'        => 'textfield',
						'heading'     => esc_html__('Text Length', 'mkdf-tours'),
						'param_name'  => 'text_length',
						'description' => esc_html__('Number of words', 'mkdf-tours')
					),
				),
				mkdf_tours_query()->queryVCParams()
			) //close array_merge
		));
	}

	/**
	 * Renders shortcodes HTML
	 *
	 * @param $atts array of shortcode params
	 * @param $content string shortcode content
	 *
	 * @return string
	 */
	public function render($atts, $content = null) {
		$args = array(
			'tour_type'                     => 'standard',
			'image_size'                    => 'full',
			'custom_image_dimensions'       => '',
			'space_between_items'			=> 'normal',
			'title_tag'                     => 'h4',
			'text_length'                   => '90'
		);

		$args   = array_merge($args, mkdf_tours_query()->getShortcodeAtts());
		$params = shortcode_atts($args, $atts);
		
		if(!empty($params['destination'])) {
			$destination_query = new \WP_Query(array('post_status' => 'published', 'post_type' => 'destinations', 'name' => esc_attr(strtolower($params['destination']))));
			wp_reset_postdata();
			$destination_id = $destination_query->posts[0]->ID;
			
			$query = mkdf_tours_query()->buildQueryObject($params, array(
				'meta_key' => 'mkdf_tours_destination',
				'meta_value' => esc_attr($destination_id)
			));
		} else {
			$query  = mkdf_tours_query()->buildQueryObject($params);
		}

		$params['query']  = $query;
		$params['caller'] = $this;

		$params['thumb_size'] = mkdf_tours_get_image_size_param($params);
		$params['carousel_data'] = $this->getSliderData($params);
		$params['list_classes'] = $this->getListClasses($params);

		return mkdf_tours_get_tour_module_template_part('tours-carousel/templates/tours-carousel-holder', 'tours', 'shortcodes', '', $params);
	}

	public function getItemTemplate($tour_type = 'standard', $params = array()) {
		echo mkdf_tours_get_tour_module_template_part('templates/tour-item/'.$tour_type, 'tours', '', '', $params);
	}

	private function getSliderData( $params ) {
		$slider_data = array();
		
		$slider_data['data-number-of-items']        = '3';
		$slider_data['data-enable-loop']            = 'yes';
		$slider_data['data-enable-navigation']      = 'no';
		$slider_data['data-enable-pagination']      = 'yes';
		
		return $slider_data;
	}

	private function getListClasses( $params ) {
		$list_classes = array();
		$list_classes[] = 'mkdf-tours-row';

		if ($params['space_between_items'] !== ''){
			$list_classes[] = 'mkdf-'.$params['space_between_items'].'-space';
		}

		return implode(' ', $list_classes);
	}
}