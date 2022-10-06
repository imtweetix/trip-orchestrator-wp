<?php
namespace MikadoTours\CPT\Tours\Shortcodes;

use MikadoTours\CPT\Tours\Lib\ToursQuery;
use MikadoTours\Lib\ShortcodeInterface;

class ToursList implements ShortcodeInterface {
	private $base;

	/**
	 * ToursCarousel constructor.
	 */
	public function __construct() {
		$this->base = 'mkdf_tours_list';

		add_action('vc_before_init', array($this, 'vcMap'));

		add_action('wp_ajax_nopriv_mkdf_tours_list_ajax_pagination', array($this, 'handleLoadMore'));
		add_action('wp_ajax_mkdf_tours_list_ajax_pagination', array($this, 'handleLoadMore'));
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
			'name'                      => esc_html__('Mikado Tours List', 'mkdf-tours'),
			'base'                      => $this->base,
			'category'        			=> esc_html__('by MIKADO TOURS', 'mkdf-tours'),
			'icon'                      => 'icon-wpb-tours-list extended-custom-tours-icon',
			'allowed_container_element' => 'vc_row',
			'params'                    => array_merge(
				array(
					array(
						'type'        => 'dropdown',
						'heading'     => esc_html__('Tours List Type', 'mkdf-tours'),
						'param_name'  => 'tour_type',
						'value'       => array(
							esc_html__('Standard', 'mkdf-tours') => 'standard',
							esc_html__('Gallery', 'mkdf-tours')  => 'gallery',
							esc_html__('Masonry', 'mkdf-tours')  => 'masonry'
						),
						'admin_label' => true,
						'save_always' => true,
						'description' => esc_html__('Default value is Standard', 'mkdf-tours'),
					),
					array(
						'type'        => 'dropdown',
						'heading'     => esc_html__('Number of Columns', 'mkdf-tours'),
						'param_name'  => 'tour_item',
						'value'       => array(
							'1' => '1',
							'2' => '2',
							'3' => '3',
							'4' => '4',
							'5' => '5',
							'6' => '6'
						),
						'save_always' => true,
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
							esc_html__('Thumbnail', 'mkdf-tours')  => 'thumbnail',
							esc_html__('Custom', 'mkdf-tours')    => 'custom'
						),
						'save_always' => true,
                        'dependency'  => array('element' => 'tour_type', 'value' => array('standard', 'gallery'))
					),
                    array(
                        'type'        => 'dropdown',
                        'heading'     => esc_html__('Masonry Proportions', 'mkdf-tours'),
                        'param_name'  => 'masonry_proportions',
                        'value'       => array(
                            esc_html__('Default', 'mkdf-tours')  => 'default',
                            esc_html__('Fixed', 'mkdf-tours')    => 'fixed',
                        ),
                        'save_always' => true,
                        'dependency'  => array('element' => 'tour_type', 'value' => array('masonry'))
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
                        'value'       => array_flip( wanderers_mkdf_get_space_between_items_array() ),
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
					array(
						'type'        => 'dropdown',
						'heading'     => esc_html__('Enable Category Filter', 'mkdf-tours'),
						'param_name'  => 'filter',
						'value'       => array(
							esc_html__('No', 'mkdf-tours')  => 'no',
							esc_html__('Yes', 'mkdf-tours') => 'yes'
						),
						'save_always' => true,
						'description' => esc_html__('Default value is No', 'mkdf-tours'),
					),
					array(
						'type'        => 'dropdown',
						'heading'     => esc_html__('Enable Load More', 'mkdf-tours'),
						'param_name'  => 'enable_load_more',
						'value'       => array(
							esc_html__('No', 'mkdf-tours')  => 'no',
							esc_html__('Yes', 'mkdf-tours') => 'yes'
						),
						'save_always' => true,
					),
					array(
						'type'        => 'textfield',
						'heading'     => esc_html__('Load More Button Text', 'mkdf-tours'),
						'param_name'  => 'load_more_text',
						'dependency'  => array('element' => 'enable_load_more', 'value' => 'yes'),
						'description' => esc_html__('Default text is "Load More"', 'mkdf-tours')
					)
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
			'tour_item'                     => '3',
			'image_size'                    => 'full',
			'custom_image_dimensions'       => '',
			'masonry_proportions'           => 'default',
			'space_between_items'			=> 'normal',
			'title_tag'	                    => 'h4',
			'text_length'                   => '90',
			'filter'                        => 'no',
			'enable_load_more'              => '',
			'load_more_text'                => ''
		);

		$args   = array_merge($args, mkdf_tours_query()->getShortcodeAtts());
		$params = shortcode_atts($args, $atts);
		
		$meta_params = $this->getMetaQueryParams($params);
		$query  = mkdf_tours_query()->buildQueryObject($params,$meta_params);

		$params['query']  = $query;
		$params['caller'] = $this;

		$params['thumb_size'] = mkdf_tours_get_image_size_param($params);

		if($params['filter'] == 'yes') {
			$params['filter_categories'] = $this->getFilterCategories($params);
		}

		$params['list_classes']			   = $this->getListClasses($params);
		$params['enable_load_more']        = $params['enable_load_more'] === 'yes';
		$params['load_more_text']          = empty($params['load_more_text']) ? esc_html__('Load More', 'mkdf-tours') : $params['load_more_text'];
		$params['display_load_more_data']  = (int) $params['number'] == $params['number'] && $params['number'] > 0;

		return mkdf_tours_get_tour_module_template_part('tours-list/templates/tours-list-holder', 'tours', 'shortcodes', '', $params);
	}

	public function getMetaQueryParams($params){
		$meta_params = array();

		if(!empty($params['destination'])) {
			$destination_query = new \WP_Query(array('post_status' => 'published', 'post_type' => 'destinations', 'name' => esc_attr(strtolower($params['destination']))));
			wp_reset_postdata();
			$destination_id = $destination_query->posts[0]->ID;
			
			$meta_params = array(
				'meta_key' => 'mkdf_tours_destination',
				'meta_value' => esc_attr($destination_id)
			);
		}

		return $meta_params;
	}


	public function handleLoadMore() {
		$fields = $this->parseRequest();

		$returnObject = new \stdClass();
		
		$meta_params = $this->getMetaQueryParams($fields);
		$query  = mkdf_tours_query()->buildQueryObject($fields,$meta_params);

		if($query->have_posts()) {
			ob_start();

			$this->getToursQueryTemplate(array(
				'query'     => $query,
				'tour_type' => $fields['tour_type'],
				'caller'    => $this,
				'params'    => $fields
			));

			$returnObject->html      = ob_get_clean();
			$returnObject->havePosts = true;
			$returnObject->message   = esc_html__('Success','mkdf-tours');
			$returnObject->nextPage  = $fields['next_page'] + 1;
		} else {
			$returnObject->havePosts = false;
			$returnObject->message   = esc_html__('No more tours.', 'mkdf-tours');
		}

		echo json_encode($returnObject);
		exit;
	}

	private function parseRequest() {
		if(empty($_POST['fields'])) {
			return false;
		}

		parse_str($_POST['fields'], $fields);

		if(!(is_array($fields) && count($fields))) {
			return false;
		}

		return $fields;
	}

	public function getItemTemplate($tour_type = 'standard', $params = array()) {
		echo mkdf_tours_get_tour_module_template_part('templates/tour-item/'.$tour_type, 'tours', '', '', $params);
	}

	public function getFilterCategories($params) {
		$cat_id       = 0;
		$top_category = '';

		if(!empty($params['tour_category'])) {
			$top_category = get_term_by('slug', $params['tour_category'], 'tour-category');
			if(isset($top_category->term_id)) {
				$cat_id = $top_category->term_id;
			}
		}

		$args = array(
			'taxonomy' => 'tour-category',
			'child_of' => $cat_id,
		);

		$filter_categories = get_terms($args);

		return $filter_categories;
	}

	public function getToursQueryTemplate($params) {
		echo mkdf_tours_get_tour_module_template_part('tours-list/templates/tours-list-loop', 'tours', 'shortcodes', '', $params);
	}

	private function getListClasses($params) {
		$list_classes = array();
		$list_classes[] = 'mkdf-tours-list-holder';
		$list_classes[] = 'mkdf-tours-row';

        $list_classes[] = ! empty( $params['space_between_items'] ) ? 'mkdf-' . $params['space_between_items'] . '-space' : 'mkdf-normal-space';

		if ($params['tour_item']) {
			$list_classes[] = 'mkdf-tours-columns-'.$params['tour_item'];
		}

		if ($params['tour_type']) {
			$list_classes[] = 'mkdf-tours-type-'.$params['tour_type'];
		}

		if($params['masonry_proportions'] == 'fixed'){
		    $list_classes[] = 'mkdf-tour-list-images-fixed';
        }

		return implode(' ', $list_classes);
	}
}