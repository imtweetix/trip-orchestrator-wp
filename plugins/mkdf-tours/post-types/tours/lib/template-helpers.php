<?php

use MikadoTours\CPT\Tours\Lib\BookingHandler;
use MikadoTours\CPT\Tours\Lib\TourPagination;

if(!function_exists('mkdf_tours_get_tour_duration')) {
	/**
	 * Returns duration for single tour
	 *
	 * @param int $tour_id
	 *
	 * @return string
	 */
	function mkdf_tours_get_tour_duration($tour_id = null) {
		$tour_id = empty($tour_id) ? get_the_ID() : $tour_id;

		$duration = get_post_meta($tour_id, 'mkdf_tours_duration', true);

		if(!$duration) {
			return false;
		}

		return $duration;
	}
}

if(!function_exists('mkdf_tours_get_tour_min_age')) {
	/**
	 * @param int $tour_id
	 *
	 * @return bool|mixed
	 */
	function mkdf_tours_get_tour_min_age($tour_id = null) {
		$tour_id = empty($tour_id) ? get_the_ID() : $tour_id;

		$tour_min_age   = get_post_meta($tour_id, 'mkdf_tours_info_min_years', true);
		$min_age_suffix = apply_filters('mkdf_tours_min_age_suffix', '+');

		return empty($tour_min_age) ? false : $tour_min_age.$min_age_suffix;
	}
}

if(!function_exists('mkdf_tours_get_tour_price')) {
	/**
	 * @param int $tour_id
	 *
	 * @return bool|string
	 */
	function mkdf_tours_get_tour_price($tour_id = null) {
		$tour_id = empty($tour_id) ? get_the_ID() : $tour_id;

		return mkdf_tours_price_helper()->getOriginalPrice($tour_id);
	}
}

if(!function_exists('mkdf_tours_get_tour_discount_price')) {
	/**
	 * @param int $tour_id
	 *
	 * @return bool|string
	 */
	function mkdf_tours_get_tour_discount_price($tour_id = null) {
		$tour_id = empty($tour_id) ? get_the_ID() : $tour_id;

		return mkdf_tours_price_helper()->getDiscountPrice($tour_id);
	}
}

if(!function_exists('mkdf_tours_get_tour_label')) {
	/**
	 * @param int $tour_id
	 *
	 * @return bool|mixed
	 */
	function mkdf_tours_get_tour_label($tour_id = null) {
		$tour_id = empty($tour_id) ? get_the_ID() : $tour_id;

		$label = get_post_meta($tour_id, 'mkdf_tours_custom_label', true);

		if(empty($label)) {
			return false;
		}

		return $label;
	}
}

if(!function_exists('mkdf_tours_get_tour_label_html')) {
	/**
	 * @param int $tour_id
	 *
	 * @return string
	 */
	function mkdf_tours_get_tour_label_html($tour_id = null) {
		$tour_id = empty($tour_id) ? get_the_ID() : $tour_id;

		$label = mkdf_tours_get_tour_label($tour_id);

		$holder_class = array('mkdf-tour-item-label');

		ob_start(); ?>

		<span class="<?php echo esc_attr(implode(' ', $holder_class)); ?>">
			<span class="mkdf-tour-item-label-inner">
				<?php echo esc_html($label); ?>
			</span>
		</span>

		<?php

		return apply_filters('mkdf_tours_get_tour_label_html', ob_get_clean(), $label);
	}
}

if(!function_exists('mkdf_tours_get_tour_excerpt')) {
	/**
	 * @param string $excerpt_length
	 *
	 * @return string
	 */
	function mkdf_tours_get_tour_excerpt($excerpt_length = '') {
		$excerpt_length = $excerpt_length > 0 ? $excerpt_length : 55;

		return wp_trim_words(get_the_excerpt(), $excerpt_length);
	}
}

if(!function_exists('mkdf_tours_get_tour_button')) {
    /**
     * @param array $params
     * @param string $id
     *
     * @return string
     */
    function mkdf_tours_get_tour_button($params = array(), $id = '') {
        extract($params);
        $id = isset($id) && $id !== '' ? $id : get_the_ID();
        $link = isset($params['link']) && $params['link'] !== '' ? $params['link'] : get_the_permalink($id);
        $type = isset($params['type']) && $params['type'] !== '' ? $params['type'] : 'simple';
        $text = isset($params['text']) && $params['text'] !== '' ? $params['text'] : esc_html__('Learn more', 'mkdf-tours');

        $button = wanderers_mkdf_get_button_html(
            array(
                'link' => $link,
                'type' => $type,
                'text' => $text
            )
        );

        return $button;
    }
}

if(!function_exists('mkdf_tours_get_tour_rating_class')) {
	/**
	 * @param int $tour_id
	 *
	 * @return string
	 */
	function mkdf_tours_get_tour_rating_class($tour_id = null) {

		if (!empty(mkdf_core_post_number_of_ratings($tour_id))){
			$rating_class = 'mkdf-tour-item-has-rating';
		}else{
			$rating_class = 'mkdf-tour-item-no-rating';
		}

		return $rating_class;
	}
}

if(!function_exists('mkdf_tours_get_tour_masonry_class')) {
    /**
     * @param int $tour_id
     *
     * @return string
     */
    function mkdf_tours_get_tour_masonry_class($image_proportions = 'fixed', $tour_id = null) {
        $tour_id = empty($tour_id) ? get_the_ID() : $tour_id;
        $classes = array();

        if($image_proportions == 'fixed') {

            $size = get_post_meta($tour_id, 'mkdf_tours_masonry_dimensions', true);
            $classes[] = 'mkdf-size-' . $size;
        }

        return implode(' ', $classes);
    }
}

if(!function_exists('mkdf_tours_get_tour_price_html')) {
	/**
	 * Generates html part for tour price.
	 *
	 * @param int $tour_id
	 *
	 * @return string
	 */
	function mkdf_tours_get_tour_price_html($tour_id = null) {
		$tour_id = empty($tour_id) ? get_the_ID() : $tour_id;

		$price          = mkdf_tours_get_tour_price($tour_id);
		$discount_price = mkdf_tours_get_tour_discount_price($tour_id);

		$holder_class = array('mkdf-tours-price-holder');
		$price_on_discount_class = ''; 

		if($discount_price) {
			$holder_class[] = 'mkdf-tours-price-with-discount';
			$price_on_discount_class = 'mkdf-tours-price-old';
		}

		ob_start(); ?>

		<span class="<?php echo esc_attr(implode(' ', $holder_class)); ?>">
			<?php if($price) : ?>
				<span class="mkdf-tours-item-price <?php echo esc_attr($price_on_discount_class);?>"><?php echo esc_html($price); ?></span>
			<?php endif; ?>
			<?php if($discount_price) : ?>
				<span class="mkdf-tours-item-discount-price mkdf-tours-item-price">
					<?php echo esc_html($discount_price); ?>
				</span>
			<?php endif; ?>
		</span>

		<?php

		return apply_filters('mkdf_tours_get_tour_price_html', ob_get_clean(), $price, $discount_price);
	}
}

if(!function_exists('mkdf_tours_get_tour_min_age_html')) {
	/**
	 * @param null $tour_id
	 *
	 * @param bool $age_label
	 *
	 * @return mixed|void
	 */
	function mkdf_tours_get_tour_min_age_html($tour_id = null, $age_label = false) {
		$tour_id = empty($tour_id) ? get_the_ID() : $tour_id;

		$min_age = mkdf_tours_get_tour_min_age($tour_id);

		ob_start(); ?>

		<?php if($min_age) : ?>

			<div class="mkdf-tour-min-age-holder">
			    <span class="mkdf-tour-min-age-icon mkdf-tour-info-icon">
				    <span class="icon_group"></span>
			    </span>

				<span class="mkdf-tour-info-label">
					<?php echo esc_html($min_age); ?>

					<?php if($age_label) : ?>
						<span class="mkdf-tour-min-age-label"><?php esc_html_e('Age', 'mkdf-tours'); ?></span>
					<?php endif; ?>
				</span>
			</div>

		<?php endif; ?>

		<?php

		return apply_filters('mkdf_tours_get_tour_min_age_html', ob_get_clean(), $min_age);
	}
}

if(!function_exists('mkdf_tours_get_tour_duration_html')) {
	/**
	 * @param null $tour_id
	 *
	 * @return mixed|void
	 */
	function mkdf_tours_get_tour_duration_html($tour_id = null) {
		$tour_id = empty($tour_id) ? get_the_ID() : $tour_id;

		$duration = mkdf_tours_get_tour_duration($tour_id);

		ob_start(); ?>

		<?php if($duration) : ?>

			<div class="mkdf-tour-duration-holder">
			    <span class="mkdf-tour-duration-icon mkdf-tour-info-icon">
					<span class="icon_clock"></span>
			    </span>
				<span class="mkdf-tour-info-label">
					<?php echo esc_html($duration); ?>
				</span>
			</div>

		<?php endif; ?>

		<?php

		return apply_filters('mkdf_tours_get_tour_duration_html', ob_get_clean(), $duration);
	}
}

if(!function_exists('mkdf_tours_get_tour_info_table_data')) {
	/**
	 * @param int $tour_id
	 *
	 * @return array
	 */
	function mkdf_tours_get_tour_info_table_data($tour_id = null) {
		$data    = array();
		$tour_id = empty($tour_id) ? get_the_ID() : $tour_id;

		$departure_option = get_post_meta($tour_id, 'mkdf_tours_departure', true);

		if(!empty($departure_option)) {
			$departure_item = array(
				'text'  => esc_html__('Departure/Return Location', 'mkdf-tours'),
				'value' => $departure_option
			);

			$data[] = $departure_item;
		}

		$departure_time_option = get_post_meta($tour_id, 'mkdf_tours_departure_time', true);

		if(!empty($departure_time_option)) {
			$departure_time_item = array(
				'text'  => esc_html__('Arrival/Departure Cities', 'mkdf-tours'),
				'value' => $departure_time_option
			);

			$data[] = $departure_time_item;
		}

		$return_time_option = get_post_meta($tour_id, 'mkdf_tours_return_time', true);

		if(!empty($return_time_option)) {
			$return_time_item = array(
				'text'  => esc_html__('Hotels', 'mkdf-tours'),
				'value' => $return_time_option
			);

			$data[] = $return_time_item;
		}

		$dress_code_option = get_post_meta($tour_id, 'mkdf_tours_dress_code', true);

		if(!empty($dress_code_option)) {
			$dress_code_item = array(
				'text'  => esc_html__('Dress Code', 'mkdf-tours'),
				'value' => $dress_code_option
			);

			$data[] = $dress_code_item;
		}

		mkdf_tours_get_tour_attributes();

		$checked_attributes = get_the_terms($tour_id, 'tour-attribute');
		$checked_attributes_slugs = array();

		if(is_array($checked_attributes) && count($checked_attributes)) {
			$checked_attributes_titles = array();

			foreach($checked_attributes as $attr) {
				$checked_attributes_titles[] = $attr->name;
				$checked_attributes_slugs[] = $attr->slug;
			}

			$checked_attributes_item = array(
				'text'       => esc_html__('Included/Highlights', 'mkdf-tours'),
				'html_class' => 'mkdf-tours-checked-attributes',
				'value'      => $checked_attributes_titles
			);

			$data[] = $checked_attributes_item;
		}

		$not_checked_attributes = array();
		$all_attributes         = mkdf_tours_get_tour_attributes();

		if(is_array($checked_attributes) && count($checked_attributes)) {
			foreach($all_attributes as $attribute_key => $attribute) {
				if(!in_array($attribute_key, $checked_attributes_slugs)) {
					$not_checked_attributes[$attribute_key] = $attribute;
				}
			}

			$not_checked_attributes_item = array(
				'text'       => esc_html__('Not Included', 'mkdf-tours'),
				'html_class' => 'mkdf-tours-unchecked-attributes',
				'value'      => $not_checked_attributes
			);

			$data[] = $not_checked_attributes_item;
		}

		return $data;
	}
}

if(!function_exists('mkdf_tours_is_checkout_page')) {
	/**
	 * @return bool
	 */
	function mkdf_tours_is_checkout_page() {
		$page_template = get_post_meta(get_the_ID(), '_wp_page_template', true);

		return $page_template === 'post-types/tours/templates/checkout/tour-checkout.php';
	}
}

if(!function_exists('mkdf_tours_get_checkout_page_content')) {
	function mkdf_tours_get_checkout_page_content() {
		$params['booking']               = mkdf_tours_get_checkout_data();
		$params['is_payment']            = mkdf_tours_is_returned_from_payment($params['booking']);
		$params['is_payment_sucessfull'] = mkdf_tours_is_payment_successfull($params['booking']);
		$params['style']                 = '';

		$id = !empty($params['booking']) ? $params['booking']->ID : -1;
		$background_image = wp_get_attachment_image_src(get_post_thumbnail_id($id),'wanderers_mkdf_landscape');
		$params['style'] = 'background-image: url('.esc_url($background_image[0]).')';

		echo mkdf_tours_get_tour_module_template_part('checkout/checkout-content', 'tours', 'templates', '', $params);
	}
}

if(!function_exists('mkdf_tours_get_checkout_data')) {
	function mkdf_tours_get_checkout_data() {
		if(empty($_GET['booking'])) {
			return false;
		}

		$booking_hash = $_GET['booking'];

		$booking         = BookingHandler::getInstance()->getBookingByHash($booking_hash);
		$can_see_booking = BookingHandler::getInstance()->canSeeBookingData($booking);

		if(!$can_see_booking) {
			return false;
		}

		return $booking;
	}
}

if(!function_exists('mkdf_tours_is_returned_from_payment')) {
	/**
	 * @param $bookingObject
	 *
	 * @return bool
	 *
	 */
	function mkdf_tours_is_returned_from_payment($bookingObject) {
		if(!$bookingObject || empty($_GET['returned_from_payment']) || empty($_GET['booking'])) {
			return false;
		}

		$returned_from_payment = $_GET['returned_from_payment'];
		$hash_from_url         = $_GET['booking'];

		return $returned_from_payment && $hash_from_url === $bookingObject->unique_hash;
	}
}

if(!function_exists('mkdf_tours_is_payment_successfull')) {
	/**
	 * @param $booking
	 *
	 * @return bool
	 */
	function mkdf_tours_is_payment_successfull($booking) {
		if(!$booking) {
			return false;
		}

		return $booking->payment_status === 'completed';
	}
}

if(!function_exists('mkdf_tours_get_search_page_content_html')) {
	/**
	 * Returns search page content
	 *
	 * @return string
	 */
	function mkdf_tours_get_search_page_content_html() {
		$tours_list = mkdf_tours_search()->search();

        $type = mkdf_tours_search()->getViewType();
        //$type = wanderers_mkdf_get_meta_field_intersect('tours_search_default_view_type',wanderers_mkdf_get_page_id() );

		$list_classes = '';
		$list_classes_array = array();
    	$list_classes_array[] = 'mkdf-tours-row';
    	$list_classes_array[] = 'mkdf-small-space';

		if($type === 'list') {
			$list_classes_array[] = 'mkdf-tours-columns-1';
		} else {
			$list_classes_array[] = 'mkdf-tours-columns-3';
		}

		$list_classes = implode(' ', $list_classes_array);

		return mkdf_tours_get_tour_module_template_part('search/search-content', 'tours', 'templates', '', compact('tours_list','list_classes'));
	}
}

if(!function_exists('mkdf_tours_get_search_page_items_loop_html')) {
	/**
	 * @param $tours_list
	 * @param string $type
	 * @param int $text_length
	 * @param string $thumb_size
	 *
	 * @return string
	 */
	function mkdf_tours_get_search_page_items_loop_html($tours_list, $type = '', $text_length = null, $thumb_size = null) {
		$type = empty($type) ? mkdf_tours_search()->getViewType() : $type;

		$default_text_length = 55;
		$default_thumb_size  = 'full';

		if(mkdf_tours_theme_installed()) {
			$default_text_length = wanderers_mkdf_options()->getOptionValue('tours_'.$type.'_text_length');

			if($type !== 'list') {
				$default_thumb_size = wanderers_mkdf_options()->getOptionValue('tours_'.$type.'_thumb_size');
			}
		}

		$text_length = is_null($text_length) ? $default_text_length : $text_length;
		$thumb_size  = is_null($thumb_size) ? $default_thumb_size : $thumb_size;

		return mkdf_tours_get_tour_module_template_part('search/search-items-content', 'tours', 'templates', '', array(
			'tours_list'  => $tours_list,
			'type'        => $type,
			'text_length' => $text_length,
			'thumb_size'  => $thumb_size
		));
	}
}

if(!function_exists('mkdf_tours_get_search_main_filters_html')) {
	/**
	 * Returns main filters html
	 *
	 * @param bool $show_tour_types
	 *
	 * @param int $number_of_tour_types
	 *
	 * @return string
	 */
	function mkdf_tours_get_search_main_filters_html($show_tour_types = true, $number_of_tour_types = 0) {
		$currency_symbol   = mkdf_tours_price_helper()->getCurrencySymbol();
		$currency_position = mkdf_tours_price_helper()->getCurrencyPosition();
		$edge_min_prices   = mkdf_tours_price_helper()->getMinPrice();
		$edge_max_prices   = mkdf_tours_price_helper()->getMaxPrice();
		
		$min_price         = empty($edge_min_prices) ? 0 : $edge_min_prices;
		$max_price         = empty($edge_max_prices) ? 5000 : $edge_max_prices;

		$tour_types = get_terms(array(
			'taxonomy' => 'tour-category',
			'orderby' => 'count',
			'order'   => 'DESC',
			'number'  => $number_of_tour_types
		));

		$checked_types    = mkdf_tours_search()->getTourCheckedTypes();
		$keyword          = mkdf_tours_search()->getKeyword();
		$destination      = mkdf_tours_search()->getDestinationKeyword();
		$chosen_month     = mkdf_tours_search()->getMonth();
		$chosen_min_price = mkdf_tours_search()->getMinPrice();
		$chosen_max_price = mkdf_tours_search()->getMaxPrice();
		$current_page     = mkdf_tours_search()->getCurrentPage();

		if(!$chosen_min_price) {
			$chosen_min_price = $min_price;
		}

		if(!$chosen_max_price) {
			$chosen_max_price = $max_price;
		}

		$months = array(
			''   => esc_html__('Month', 'mkdf-tours'),
			'1'  => esc_html__('January', 'mkdf-tours'),
			'2'  => esc_html__('February', 'mkdf-tours'),
			'3'  => esc_html__('March', 'mkdf-tours'),
			'4'  => esc_html__('April', 'mkdf-tours'),
			'5'  => esc_html__('May', 'mkdf-tours'),
			'6'  => esc_html__('June', 'mkdf-tours'),
			'7'  => esc_html__('July', 'mkdf-tours'),
			'8'  => esc_html__('August', 'mkdf-tours'),
			'9'  => esc_html__('September', 'mkdf-tours'),
			'10' => esc_html__('October', 'mkdf-tours'),
			'11' => esc_html__('November', 'mkdf-tours'),
			'12' => esc_html__('December', 'mkdf-tours')
		);

		return mkdf_tours_get_tour_module_template_part('search/main-filters', 'tours', 'templates', '', compact(
			'currency_symbol',
			'currency_position',
			'min_price',
			'max_price',
			'chosen_min_price',
			'chosen_max_price',
			'tour_types',
			'checked_types',
			'keyword',
			'destination',
			'chosen_month',
			'months',
			'current_page',
			'show_tour_types'
		));
	}
}

if(!function_exists('mkdf_tours_get_search_ordering_html')) {
	/**
	 * Returns search ordering html
	 *
	 * @return string
	 */
	function mkdf_tours_get_search_ordering_html() {
		$current_ordering   = mkdf_tours_search()->getOrderBy();
		$current_order_type = mkdf_tours_search()->getOrderType();
		$current_view_type  = mkdf_tours_search()->getViewType();

		$ordering = array(
			'date'       => array(
				'title'      => esc_html__('DATE', 'mkdf-tours'),
				'icon'       => 'ion-calendar',
				'order_by'   => 'date',
				'order_type' => 'desc'
			),
			'price_low'  => array(
				'title'      => esc_html__('PRICE LOW TO HIGH', 'mkdf-tours'),
				'icon'       => 'ion-arrow-up-a',
				'order_by'   => 'price',
				'order_type' => 'asc'
			),
			'price_high' => array(
				'title'      => esc_html__('PRICE HIGH TO LOW', 'mkdf-tours'),
				'icon'       => 'ion-arrow-down-a',
				'order_by'   => 'price',
				'order_type' => 'desc'
			),
			'name'       => array(
				'title'      => esc_html__('NAME (A - Z)', 'mkdf-tours'),
				'icon'       => 'ion-edit',
				'order_by'   => 'name',
				'order_type' => 'asc'
			)
		);

		$view_types = array(
			'list'     => array(
				'type' => 'list',
				'icon' => 'icon_ul'
			),
			'standard' => array(
				'type' => 'standard',
				'icon' => 'icon_grid-2x2'
			),
			'gallery'  => array(
				'type' => 'gallery',
				'icon' => 'icon_grid-3x3'
			)
		);

		return mkdf_tours_get_tour_module_template_part('search/ordering', 'tours', 'templates', '', compact(
			'current_ordering',
			'current_order_type',
			'current_view_type',
			'ordering',
			'view_types'
		));
	}
}

if(!function_exists('mkdf_tours_get_search_pagination')) {
	/**
	 * Prints tours pagination template
	 */
	function mkdf_tours_get_search_pagination() {
		$perPage      = mkdf_tours_search()->getToursPerPage();
		$total        = mkdf_tours_search()->getTotal();
		$current_page = mkdf_tours_search()->getCurrentPage();

		$pagination = new TourPagination($perPage, $total, $current_page);

		return $pagination->paginate();
	}
}

if(!function_exists('mkdf_tours_get_tour_categories_html')) {
	/**
	 * @param null $tour_id
	 *
	 *
	 * @return mixed|void
	 */
	function mkdf_tours_get_tour_categories_html($tour_id = null) {
		$tour_id = empty($tour_id) ? get_the_ID() : $tour_id;

		$categories = wp_get_post_terms($tour_id, 'tour-category');

		ob_start();

		?>

		<?php if(is_array($categories) && count($categories)) : ?>
			<div class="mkdf-tours-tour-categories-holder">
				<?php foreach($categories as $category) : ?>
					<div class="mkdf-tours-tour-categories-item">
						<a href="<?php echo esc_url(get_category_link($category->term_id)); ?>">
							<?php
							$category_image_id = get_term_meta($category->term_id, 'tours_category_custom_image', true);
							$image_original    = wp_get_attachment_image_src( $category_image_id, 'full' );
							$category_image    = $image_original[0];
							
							if(mkdf_tours_theme_installed() && empty($category_image)) {

								$category_icon_pack = get_term_meta($category->term_id, 'tours_category_icon', true);
								$icon_param_name    = wanderers_mkdf_icon_collections()->getIconCollectionParamNameByKey($category_icon_pack);
								$category_icon      = get_term_meta($category->term_id, 'tours_category_icon_'.$icon_param_name, true);

                                if(!empty($category_icon)) { ?>
									<span class="mkdf-tour-cat-item-icon">
										<?php echo wanderers_mkdf_icon_collections()->renderIcon($category_icon, $category_icon_pack); ?>
									</span>
								<?php } ?>

							<?php } else { ?>
								<span class="mkdf-tour-cat-item-icon mkdf-tour-cat-item-custom-image">
									<img src="<?php echo esc_url($category_image) ?>" alt="term-custom-icon">
								</span>
							<?php } ?>

							<span class="mkdf-tour-cat-item-text">
								<?php echo esc_html($category->name); ?>
							</span>
						</a>
					</div>
				<?php endforeach; ?>
			</div>
		<?php endif; ?>

		<?php

		return apply_filters('mkdf_tours_get_tour_categories_html', ob_get_clean(), $categories);
	}
}

if(!function_exists('mkdf_get_tours_destination_html')){
    function mkdf_get_tours_destination_html($tour_id = null){
        $tour_id = empty($tour_id) ? get_the_ID() : $tour_id;

        $destination_id = get_post_meta($tour_id, 'mkdf_tours_destination', true);
        $use_custom_icon = get_post_meta($destination_id, 'mkdf_destination_use_custom_icon', true);

        if(!empty($destination_id)){
            $args = array(
                'post_status' => 'published',
                'post_type'   => 'destinations',
                'p'           => $destination_id
            );

            $destination_object = new \WP_Query($args);

            if(!empty($destination_object) && is_array($destination_object)){

                $destination_title = $destination_object->posts[0]->post_title;
                $destination_link  = get_the_permalink($destination_id);

                $destination_image = get_post_meta($destination_id, 'mkdf_destination_custom_icon', true);

                $destination_icon_pack  = get_post_meta($destination_id, 'mkdf_destination_icon', true);
                $icon_param_name    = wanderers_mkdf_icon_collections()->getIconCollectionParamNameByKey($destination_icon_pack['icon_pack']);

                $html = '<div class="mkdf-tour-destination-holder">';

                if(!empty($destination_icon_pack) && $use_custom_icon == 'no'){
                    $html .= '<div class="mkdf-destination-icon mkdf-tour-info-icon">'. wanderers_mkdf_icon_collections()->renderIcon($destination_icon_pack[$icon_param_name], $destination_icon_pack['icon_pack']) .'</div>';
                }
                else if(!empty($destination_image) && $use_custom_icon == 'yes'){
                    $html .= '<div class="mkdf-destination-image mkdf-tour-info-icon"><img src="'.esc_url($destination_image).'" alt="mkdf-tour-info-icon" ></div>';
                }

                $html .= '<a class="mkdf-tours-destionation-link" href="'.$destination_link.'"> '.$destination_title.' </a>';

                $html .= '</div>';

                return $html;
            }
        }

    }
}

if(!function_exists('mkdf_tours_get_tour_image_html')) {
	/**
	 * @param $image_size
	 * @param $use_custom
	 *
	 * @return string
	 */
	function mkdf_tours_get_tour_image_html($image_size, $use_custom = false) {
		$image_size = trim($image_size);
        $list_image = get_post_meta(get_the_ID(), 'mkdf_tours_list_image', true);
        $id = !empty($list_image) && $list_image != '' && $use_custom ? wanderers_mkdf_get_attachment_id_from_url($list_image) : get_post_thumbnail_id(get_the_ID());

		if(strstr($image_size, 'x')) {
			//Find digits
			preg_match_all('/\d+/', $image_size, $matches);

			if(!empty($matches[0])) {
				$width  = $matches[0][0];
				$height = $matches[0][1];

				return mkdf_tours_generate_thumbnail($id, null, $width, $height);
			}
		}

		return wp_get_attachment_image($id, $image_size);
	}
}

if(!function_exists('mkdf_tours_get_image_size_param')) {
	/**
	 * @param $params
	 *
	 * @return string
	 */
	function mkdf_tours_get_image_size_param($params) {
		$use_custom_size = !empty($params['custom_image_dimensions']) && $params['image_size'];

		if(!$use_custom_size) {
			$thumb_size = 'full';

			if(!empty($params['image_size'])) {
				$image_size = $params['image_size'];

				switch($image_size) {
					case 'landscape':
					case 'large-width':
						$thumb_size = 'wanderers_mkdf_landscape';
						break;
					case 'portrait':
					case 'large-height':
						$thumb_size = 'wanderers_mkdf_portrait';
						break;
					case 'square':
						$thumb_size = 'wanderers_mkdf_square';
						break;
					case 'large-width-height':
						$thumb_size = 'wanderers_mkdf_huge';
						break;
                    case 'thumbnail':
						$thumb_size = 'thumbnail';
						break;
                    case 'full':
						$thumb_size = 'full';
						break;
					default:
						$thumb_size = 'full';
						break;
				}
			}

			return $thumb_size;
		}

		return $params['custom_image_dimensions'];
	}
}

?>