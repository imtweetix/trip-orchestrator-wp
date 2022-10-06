<?php

if ( ! function_exists( 'wanderers_mkdf_sticky_header_global_js_var' ) ) {
	function wanderers_mkdf_sticky_header_global_js_var( $global_variables ) {
		$global_variables['mkdfStickyHeaderHeight']             = wanderers_mkdf_get_sticky_header_height();
		$global_variables['mkdfStickyHeaderTransparencyHeight'] = wanderers_mkdf_get_sticky_header_height_of_complete_transparency();
		
		return $global_variables;
	}
	
	add_filter( 'wanderers_mkdf_js_global_variables', 'wanderers_mkdf_sticky_header_global_js_var' );
}

if ( ! function_exists( 'wanderers_mkdf_sticky_header_per_page_js_var' ) ) {
	function wanderers_mkdf_sticky_header_per_page_js_var( $perPageVars ) {
		$perPageVars['mkdfStickyScrollAmount'] = wanderers_mkdf_get_sticky_scroll_amount();
		
		return $perPageVars;
	}
	
	add_filter( 'wanderers_mkdf_per_page_js_vars', 'wanderers_mkdf_sticky_header_per_page_js_var' );
}

if ( ! function_exists( 'wanderers_mkdf_register_sticky_header_areas' ) ) {
	/**
	 * Registers widget area for sticky header
	 */
	function wanderers_mkdf_register_sticky_header_areas() {
		register_sidebar(
			array(
				'id'            => 'mkdf-sticky-right',
				'name'          => esc_html__( 'Sticky Header Widget Area', 'wanderers' ),
				'description'   => esc_html__( 'Widgets added here will appear on the right hand side from the sticky menu', 'wanderers' ),
				'before_widget' => '<div id="%1$s" class="widget %2$s mkdf-sticky-right">',
				'after_widget'  => '</div>'
			)
		);
	}
	
	add_action( 'widgets_init', 'wanderers_mkdf_register_sticky_header_areas' );
}

if ( ! function_exists( 'wanderers_mkdf_get_sticky_menu' ) ) {
	/**
	 * Loads sticky menu HTML
	 *
	 * @param string $additional_class addition class to pass to template
	 */
	function wanderers_mkdf_get_sticky_menu( $additional_class = 'mkdf-default-nav' ) {
		wanderers_mkdf_get_module_template_part( 'templates/sticky-navigation', 'header/types/sticky-header', '', array( 'additional_class' => $additional_class ) );
	}
}

if ( ! function_exists( 'wanderers_mkdf_get_sticky_header' ) ) {
	/**
	 * Loads sticky header behavior HTML
	 */
	function wanderers_mkdf_get_sticky_header( $slug = '', $module = '' ) {
        $page_id             = wanderers_mkdf_get_page_id();
		$sticky_in_grid      = wanderers_mkdf_options()->getOptionValue( 'sticky_header_in_grid' ) == 'yes' ? true : false;
		$header_in_grid_meta = get_post_meta( $page_id, 'mkdf_menu_area_in_grid_meta', true);
		$menu_area_position  = wanderers_mkdf_get_meta_field_intersect( 'set_menu_area_position', $page_id );
		
		if ( $header_in_grid_meta === 'yes' && ! $sticky_in_grid ) {
			$sticky_in_grid = true;
		} else if ( $header_in_grid_meta === 'no' && $sticky_in_grid ) {
			$sticky_in_grid = false;
		}
		
		$parameters = array(
			'hide_logo'             => wanderers_mkdf_options()->getOptionValue( 'hide_logo' ) == 'yes' ? true : false,
			'sticky_header_in_grid' => $sticky_in_grid,
            'menu_area_position'    => $menu_area_position,
			'menu_area_class'       => ! empty( $menu_area_position ) ? 'mkdf-menu-' . $menu_area_position : ''
		);
		
		$module = ! empty( $module ) ? $module : 'header/types/sticky-header';
		
		wanderers_mkdf_get_module_template_part( 'templates/sticky-header', $module, $slug, $parameters );
	}
}

if ( ! function_exists( 'wanderers_mkdf_get_sticky_header_height' ) ) {
	/**
	 * Returns top sticky header height
	 *
	 * @return bool|int|void
	 */
	function wanderers_mkdf_get_sticky_header_height() {
		$allow_sticky_behavior = true;
		$allow_sticky_behavior = apply_filters( 'wanderers_mkdf_allow_sticky_header_behavior', $allow_sticky_behavior );
		$header_behaviour      = wanderers_mkdf_get_meta_field_intersect( 'header_behaviour' );
		
		//sticky menu height, needed only for sticky header on scroll up
		if ( $allow_sticky_behavior && in_array( $header_behaviour, array( 'sticky-header-on-scroll-up', 'sticky-header-on-scroll-down-up' ) ) ) {
			$sticky_header_height = wanderers_mkdf_filter_px( wanderers_mkdf_options()->getOptionValue( 'sticky_header_height' ) );
			
			return $sticky_header_height !== '' ? intval( $sticky_header_height ) : 70;
		} else {
			return 0;
		}
	}
}

if ( ! function_exists( 'wanderers_mkdf_get_sticky_header_height_of_complete_transparency' ) ) {
	/**
	 * Returns top sticky header height it is fully transparent. used in anchor logic
	 *
	 * @return bool|int|void
	 */
	function wanderers_mkdf_get_sticky_header_height_of_complete_transparency() {
		$allow_sticky_behavior = true;
		$allow_sticky_behavior = apply_filters( 'wanderers_mkdf_allow_sticky_header_behavior', $allow_sticky_behavior );
		
		if ( $allow_sticky_behavior ) {
			$stickyHeaderTransparent = wanderers_mkdf_options()->getOptionValue( 'sticky_header_background_color' ) !== '' && wanderers_mkdf_options()->getOptionValue( 'sticky_header_transparency' ) === '0';
			
			if ( $stickyHeaderTransparent ) {
				return 0;
			} else {
				$sticky_header_height = wanderers_mkdf_filter_px( wanderers_mkdf_options()->getOptionValue( 'sticky_header_height' ) );
				
				return $sticky_header_height !== '' ? intval( $sticky_header_height ) : 70;
			}
		} else {
			return 0;
		}
	}
}

if ( ! function_exists( 'wanderers_mkdf_get_sticky_scroll_amount' ) ) {
	/**
	 * Returns top sticky scroll amount
	 *
	 * @return bool|int|void
	 */
	function wanderers_mkdf_get_sticky_scroll_amount() {
		$allow_sticky_behavior = true;
		$allow_sticky_behavior = apply_filters( 'wanderers_mkdf_allow_sticky_header_behavior', $allow_sticky_behavior );
		$header_behaviour      = wanderers_mkdf_get_meta_field_intersect( 'header_behaviour' );
		
		//sticky menu scroll amount
		if ( $allow_sticky_behavior && in_array( $header_behaviour, array( 'sticky-header-on-scroll-up', 'sticky-header-on-scroll-down-up' ) ) ) {
			$sticky_scroll_amount = wanderers_mkdf_filter_px( wanderers_mkdf_get_meta_field_intersect( 'scroll_amount_for_sticky' ) );
			
			return $sticky_scroll_amount !== '' ? intval( $sticky_scroll_amount ) : 0;
		} else {
			return 0;
		}
	}
}