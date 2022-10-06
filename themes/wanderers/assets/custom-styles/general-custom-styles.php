<?php

if(!function_exists('wanderers_mkdf_design_styles')) {
    /**
     * Generates general custom styles
     */
    function wanderers_mkdf_design_styles() {
	    $font_family = wanderers_mkdf_options()->getOptionValue( 'google_fonts' );
	    if ( ! empty( $font_family ) && wanderers_mkdf_is_font_option_valid( $font_family ) ) {
		    $font_family_selector = array(
			    'body'
		    );
		    echo wanderers_mkdf_dynamic_css( $font_family_selector, array( 'font-family' => wanderers_mkdf_get_font_option_val( $font_family ) ) );
	    }

		$first_main_color = wanderers_mkdf_options()->getOptionValue('first_color');
        if(!empty($first_main_color)) {
            $color_selector = array(

	            'a:hover',
	            'h1 a:hover',
	            'h2 a:hover',
	            'h3 a:hover',
	            'h4 a:hover',
	            'h5 a:hover',
	            'h6 a:hover',
	            'p a:hover',
	            'blockquote:before',
	            '.mkdf-comment-holder .mkdf-comment-text .comment-reply-link:before',
	            '.mkdf-comment-holder .mkdf-comment-text #cancel-comment-reply-link',
	            '.mkdf-owl-slider .owl-nav .owl-next:hover',
	            '.mkdf-owl-slider .owl-nav .owl-prev:hover',
	            'footer .widget ul li a:hover',
	            'footer .widget #wp-calendar tfoot a:hover',
	            'footer .widget.widget_search .input-holder button:hover',
	            'footer .widget.widget_tag_cloud a:hover',
	            'footer .mkdf-footer-bottom-holder .widget a:hover',
	            '.mkdf-fullscreen-sidebar .widget ul li a:hover',
	            '.mkdf-fullscreen-sidebar .widget #wp-calendar tfoot a:hover',
	            '.mkdf-fullscreen-sidebar .widget.widget_search .input-holder button:hover',
	            '.mkdf-fullscreen-sidebar .widget.widget_tag_cloud a:hover',
	            '.mkdf-side-menu .widget ul li a:hover',
	            '.mkdf-side-menu .widget #wp-calendar tfoot a:hover',
	            '.mkdf-side-menu .widget.widget_search .input-holder button:hover',
	            '.mkdf-side-menu .widget.widget_tag_cloud a:hover',
	            '.wpb_widgetised_column .widget ul li a:hover',
	            'aside.mkdf-sidebar .widget ul li a:hover',
	            '.wpb_widgetised_column .widget #wp-calendar tfoot a:hover',
	            'aside.mkdf-sidebar .widget #wp-calendar tfoot a:hover',
	            '.wpb_widgetised_column .widget.widget_search .input-holder button:hover',
	            'aside.mkdf-sidebar .widget.widget_search .input-holder button:hover',
	            '.wpb_widgetised_column .widget.widget_tag_cloud a:hover',
	            'aside.mkdf-sidebar .widget.widget_tag_cloud a:hover',
	            '.wpb_widgetised_column .mkdf-blog-list-widget .mkdf-blog-list-holder .mkdf-bli-inner .mkdf-post-title a:hover',
	            'aside.mkdf-sidebar .mkdf-blog-list-widget .mkdf-blog-list-holder .mkdf-bli-inner .mkdf-post-title a:hover',
	            'footer .widget.mkdf-blog-list-widget .mkdf-post-title a:hover',
	            '.widget ul li a:hover',
	            '.widget #wp-calendar tfoot a:hover',
	            '.widget.widget_search .input-holder button:hover',
	            '.widget.widget_tag_cloud a:hover',
	            '.widget.mkdf-search-post-type-widget .mkdf-search-loading',
	            '.widget.widget_mkdf_twitter_widget .mkdf-twitter-widget.mkdf-twitter-standard li .mkdf-tweet-text a',
	            '.widget.widget_mkdf_twitter_widget .mkdf-twitter-widget.mkdf-twitter-standard li .mkdf-tweet-text span',
	            '.widget.widget_mkdf_twitter_widget .mkdf-twitter-widget.mkdf-twitter-slider li .mkdf-tweet-text a',
	            '.widget.widget_mkdf_twitter_widget .mkdf-twitter-widget.mkdf-twitter-slider li .mkdf-tweet-text span',
	            '.widget.widget_mkdf_twitter_widget .mkdf-twitter-widget.mkdf-twitter-standard li .mkdf-tweet-text a:hover',
	            '.widget.widget_mkdf_twitter_widget .mkdf-twitter-widget.mkdf-twitter-slider li .mkdf-twitter-icon i',
	            'body .pp_pic_holder a.pp_next:hover',
	            'body .pp_pic_holder a.pp_previous:hover',
	            '.widget_icl_lang_sel_widget .wpml-ls-legacy-dropdown ul ul a:hover',
	            '.widget_icl_lang_sel_widget .wpml-ls-legacy-dropdown-click ul ul a:hover',
	            '.mkdf-blog-holder article.sticky .mkdf-post-title a',
	            '.mkdf-blog-holder article .mkdf-post-info-top>div a:hover',
	            '.mkdf-blog-holder article .mkdf-post-info-bottom .mkdf-post-info-bottom-left>div a.mkdf-like.liked i',
	            '.mkdf-blog-holder article .mkdf-post-info-bottom .mkdf-post-info-bottom-left>div a:hover',
	            '.mkdf-blog-holder article .mkdf-post-info-bottom .mkdf-post-info-bottom-left>div a:hover i',
	            '.mkdf-blog-holder article .mkdf-post-info-bottom .mkdf-post-info-bottom-left>div a:hover span',
	            '.mkdf-blog-holder article .mkdf-post-info-bottom .mkdf-post-info-bottom-left>div.mkdf-post-info-category:hover a',
	            '.mkdf-blog-holder article .mkdf-post-info-bottom .mkdf-post-info-bottom-left>div.mkdf-post-info-category:hover i',
	            '.mkdf-blog-holder article.format-link.mkdf-post-light-skin .mkdf-post-info-bottom .mkdf-post-info-bottom-left>div a:hover',
	            '.mkdf-blog-holder article.format-link.mkdf-post-light-skin .mkdf-post-info-bottom .mkdf-post-info-bottom-left>div i:hover',
	            '.mkdf-blog-holder article.format-link.mkdf-post-light-skin .mkdf-post-info-bottom .mkdf-post-info-bottom-left>div.mkdf-post-info-category:hover a',
	            '.mkdf-blog-holder article.format-link.mkdf-post-light-skin .mkdf-post-info-bottom .mkdf-post-info-bottom-left>div.mkdf-post-info-category:hover i',
	            '.mkdf-blog-holder article.format-link .mkdf-post-mark .mkdf-link-mark',
	            '.mkdf-blog-holder article.format-quote .mkdf-post-mark .mkdf-quote-mark',
	            '.mkdf-bl-standard-pagination ul li.mkdf-bl-pag-active a',
	            '.mkdf-blog-holder.mkdf-blog-type-masonry article .mkdf-post-title a:hover',
	            '.mkdf-blog-pagination ul li a.mkdf-pag-active',
	            '.mkdf-author-description .mkdf-author-description-text-holder .mkdf-author-name a:hover',
	            '.mkdf-author-description .mkdf-author-description-text-holder .mkdf-author-social-icons a:hover',
	            '.mkdf-single-links-pages .mkdf-single-links-pages-inner>span',
	            '.mkdf-blog-holder.mkdf-blog-single article .mkdf-post-info-bottom .mkdf-post-info-bottom-left>div a:hover',
	            '.mkdf-blog-holder.mkdf-blog-single article.format-link .mkdf-post-mark .mkdf-link-mark',
	            '.mkdf-blog-list-holder .mkdf-bli-info>div a.mkdf-like.liked',
	            '.mkdf-blog-list-holder .mkdf-bli-info>div a:hover',
	            '.mkdf-blog-list-holder.mkdf-bl-masonry .mkdf-bl-item .mkdf-post-title a:hover',
	            '.mkdf-main-menu ul li a:hover',
	            '.mkdf-main-menu>ul>li.mkdf-active-item>a',
	            '.mkdf-light-header .mkdf-page-header>div:not(.mkdf-sticky-header):not(.fixed) .mkdf-main-menu>ul>li.mkdf-active-item>a',
	            '.mkdf-light-header .mkdf-page-header>div:not(.mkdf-sticky-header):not(.fixed) .mkdf-main-menu>ul>li>a:hover',
	            '.mkdf-dark-header .mkdf-page-header>div:not(.mkdf-sticky-header):not(.fixed) .mkdf-main-menu>ul>li.mkdf-active-item>a',
	            '.mkdf-dark-header .mkdf-page-header>div:not(.mkdf-sticky-header):not(.fixed) .mkdf-main-menu>ul>li>a:hover',
	            '.mkdf-drop-down .second .inner ul li.current-menu-ancestor>a',
	            '.mkdf-drop-down .second .inner ul li.current-menu-item>a',
	            '.mkdf-dark-header .mkdf-page-header>div:not(.mkdf-sticky-header):not(.fixed) .mkdf-fullscreen-menu-opener.mkdf-fm-opened',
	            '.mkdf-dark-header .mkdf-page-header>div:not(.mkdf-sticky-header):not(.fixed) .mkdf-fullscreen-menu-opener:hover',
	            '.mkdf-fullscreen-menu-opener.mkdf-fm-opened',
	            '.mkdf-light-header .mkdf-page-header>div:not(.mkdf-sticky-header):not(.fixed) .mkdf-fullscreen-menu-opener.mkdf-fm-opened',
	            '.mkdf-light-header .mkdf-page-header>div:not(.mkdf-sticky-header):not(.fixed) .mkdf-fullscreen-menu-opener:hover',
	            'nav.mkdf-fullscreen-menu ul li ul li.current-menu-ancestor>a',
	            'nav.mkdf-fullscreen-menu ul li ul li.current-menu-item>a',
	            'nav.mkdf-fullscreen-menu>ul>li.mkdf-active-item>a',
	            '.mkdf-mobile-header .mkdf-mobile-menu-opener.mkdf-mobile-menu-opened a',
	            '.mkdf-mobile-header .mkdf-mobile-nav .mkdf-grid>ul>li.mkdf-active-item>a',
	            '.mkdf-mobile-header .mkdf-mobile-nav .mkdf-grid>ul>li.mkdf-active-item>h6',
	            '.mkdf-mobile-header .mkdf-mobile-nav ul li a:hover',
	            '.mkdf-mobile-header .mkdf-mobile-nav ul li h6:hover',
	            '.mkdf-mobile-header .mkdf-mobile-nav ul ul li.current-menu-ancestor>a',
	            '.mkdf-mobile-header .mkdf-mobile-nav ul ul li.current-menu-ancestor>h6',
	            '.mkdf-mobile-header .mkdf-mobile-nav ul ul li.current-menu-item>a',
	            '.mkdf-mobile-header .mkdf-mobile-nav ul ul li.current-menu-item>h6',
	            '.mkdf-top-bar .widget a:hover',
	            '.mkdf-search-page-holder article.sticky .mkdf-post-title a',
	            '.mkdf-search-cover .mkdf-form-holder-inner>span',
	            '.mkdf-search-cover .mkdf-search-close:hover',
	            '.mkdf-reviews-per-criteria .mkdf-item-reviews-average-rating',
	            '.mkdf-comment-list .mkdf-rating-inner .mkdf-rating-value',
	            '.mkdf-top-reviews-carousel-holder .mkdf-tour-reviews-criteria-holder',
	            '.mkdf-accordion-holder .mkdf-accordion-title.ui-state-active .mkdf-accordion-mark span',
	            '.mkdf-accordion-holder .mkdf-accordion-title.ui-state-hover .mkdf-accordion-mark span',
	            '.mkdf-accordion-holder.mkdf-ac-simple .mkdf-accordion-title.ui-state-active .mkdf-tab-title',
	            '.mkdf-btn.mkdf-btn-simple',
	            '.mkdf-btn.mkdf-btn-outline',
	            '.mkdf-iwt a:hover .mkdf-iwt-title .mkdf-iwt-title-text',
	            '.mkdf-social-share-holder.mkdf-list li a:hover',
	            '.mkdf-social-share-holder.mkdf-dropdown .mkdf-social-share-dropdown-opener:hover',
	            '.mkdf-tabs.mkdf-tabs-standard .mkdf-tabs-nav li.ui-state-active a',
	            '.mkdf-tabs.mkdf-tabs-standard .mkdf-tabs-nav li.ui-state-hover a',
	            '.mkdf-tabs.mkdf-tabs-boxed .mkdf-tabs-nav li.ui-state-active a',
	            '.mkdf-tabs.mkdf-tabs-boxed .mkdf-tabs-nav li.ui-state-hover a',
	            '.mkdf-tabs.mkdf-tabs-simple .mkdf-tabs-nav li.ui-state-active a',
	            '.mkdf-tabs.mkdf-tabs-simple .mkdf-tabs-nav li.ui-state-hover a',
	            '.mkdf-team-holder .mkdf-team-social-holder .mkdf-team-icon .mkdf-icon-element:hover',
	            '.mkdf-video-button-holder .mkdf-video-button-text-wrapper-inner .mkdf-vb-subtitle',
	            '.mkdf-video-button-holder .mkdf-video-button-play'
            );

            $woo_color_selector = array();
            if(wanderers_mkdf_is_woocommerce_installed()) {
                $woo_color_selector = array(
	                '.mkdf-woo-single-page .woocommerce-tabs #reviews .comment-respond .stars a.active:after',
	                '.mkdf-woo-single-page .woocommerce-tabs #reviews .comment-respond .stars a:before',
	                '.woocommerce .star-rating',
	                '.woocommerce-pagination .page-numbers li a.current',
	                '.woocommerce-pagination .page-numbers li a:hover',
	                '.woocommerce-pagination .page-numbers li span.current',
	                '.woocommerce-pagination .page-numbers li span:hover',
	                '.mkdf-woocommerce-page.woocommerce-account .woocommerce-MyAccount-navigation ul li.is-active a',
	                '.mkdf-woo-single-page .mkdf-single-product-summary .product_meta>span a:hover',
	                '.mkdf-woo-single-page .woocommerce-tabs ul.tabs>li.active a',
	                '.mkdf-woo-single-page .woocommerce-tabs ul.tabs>li:hover a',
	                '.mkdf-woo-single-page .woocommerce-tabs ul.tabs>li a:before',
	                '.mkdf-dark-header .mkdf-page-header>div:not(.mkdf-sticky-header):not(.fixed) .mkdf-shopping-cart-holder .mkdf-header-cart:hover',
	                '.mkdf-light-header .mkdf-page-header>div:not(.mkdf-sticky-header):not(.fixed) .mkdf-shopping-cart-holder .mkdf-header-cart:hover',
	                '.widget.woocommerce.widget_layered_nav ul li.chosen a',
	                '.widget.woocommerce.widget_products .product_list_widget a:hover .product-title',
	                '.widget.woocommerce.widget_products ul li .amount',
	                '.widget.woocommerce.widget_recently_viewed_products ul li .amount',
	                '.widget.woocommerce.widget_top_rated_products ul li .amount',
                );
            }

            $color_selector = array_merge($color_selector, $woo_color_selector);

	        $color_important_selector = array(
		        '.mkdf-dark-header .mkdf-page-header>div:not(.mkdf-sticky-header):not(.fixed) .mkdf-social-icon-widget-holder:hover',
		        '.mkdf-light-header .mkdf-page-header>div:not(.mkdf-sticky-header):not(.fixed) .mkdf-social-icon-widget-holder:hover',
		        '.mkdf-light-header .mkdf-page-header>div:not(.mkdf-sticky-header):not(.fixed) .mkdf-search-opener:hover',
		        '.mkdf-light-header .mkdf-top-bar .mkdf-search-opener:hover',
		        '.mkdf-dark-header .mkdf-page-header>div:not(.mkdf-sticky-header):not(.fixed) .mkdf-search-opener:hover',
		        '.mkdf-dark-header .mkdf-top-bar .mkdf-search-opener:hover',
		        '.mkdf-light-header .mkdf-page-header>div:not(.mkdf-sticky-header):not(.fixed) .mkdf-side-menu-button-opener.opened',
		        '.mkdf-light-header .mkdf-page-header>div:not(.mkdf-sticky-header):not(.fixed) .mkdf-side-menu-button-opener:hover',
		        '.mkdf-light-header .mkdf-top-bar .mkdf-side-menu-button-opener.opened',
		        '.mkdf-light-header .mkdf-top-bar .mkdf-side-menu-button-opener:hover',
		        '.mkdf-dark-header .mkdf-page-header>div:not(.mkdf-sticky-header):not(.fixed) .mkdf-side-menu-button-opener.opened',
		        '.mkdf-dark-header .mkdf-page-header>div:not(.mkdf-sticky-header):not(.fixed) .mkdf-side-menu-button-opener:hover',
		        '.mkdf-dark-header .mkdf-top-bar .mkdf-side-menu-button-opener.opened',
		        '.mkdf-dark-header .mkdf-top-bar .mkdf-side-menu-button-opener:hover',
		        '.mkdf-btn.mkdf-btn-simple:not(.mkdf-btn-custom-hover-color):hover',
	        );

	        $fill_selector = array(
		        '.mkdf-wanderer-loader path'
	        );

            $background_color_selector = array(

	            '.mkdf-st-loader .pulse',
	            '.mkdf-st-loader .double_pulse .double-bounce1',
	            '.mkdf-st-loader .double_pulse .double-bounce2',
	            '.mkdf-st-loader .cube',
	            '.mkdf-st-loader .rotating_cubes .cube1',
	            '.mkdf-st-loader .rotating_cubes .cube2',
	            '.mkdf-st-loader .stripes>div',
	            '.mkdf-st-loader .wave>div',
	            '.mkdf-st-loader .two_rotating_circles .dot1',
	            '.mkdf-st-loader .two_rotating_circles .dot2',
	            '.mkdf-st-loader .five_rotating_circles .container1>div',
	            '.mkdf-st-loader .five_rotating_circles .container2>div',
	            '.mkdf-st-loader .five_rotating_circles .container3>div',
	            '.mkdf-st-loader .lines .line1',
	            '.mkdf-st-loader .lines .line2',
	            '.mkdf-st-loader .lines .line3',
	            '.mkdf-st-loader .lines .line4',
	            '#submit_comment',
	            '.post-password-form input[type=submit]',
	            'input.wpcf7-form-control.wpcf7-submit',
	            '#submit_comment',
	            '.mkdf-owl-slider .owl-dots .owl-dot.active span',
	            '.mkdf-owl-slider .owl-dots .owl-dot:hover span',
	            '.error404 .mkdf-page-not-found .searchform button',
	            '#mkdf-back-to-top>span',
	            '.widget.mkdf-search-post-type-widget .mkdf-search-icon',
	            '.widget.mkdf-search-post-type-widget .mkdf-search-loading',
	            '.mkdf-social-icons-group-widget.mkdf-square-icons .mkdf-social-icon-widget-holder:hover',
	            '.mkdf-social-icons-group-widget.mkdf-square-icons.mkdf-light-skin .mkdf-social-icon-widget-holder:hover',
	            '.mkdf-blog-holder article.format-gallery .mkdf-blog-gallery.mkdf-owl-slider .owl-nav .owl-next',
	            '.mkdf-blog-holder article.format-gallery .mkdf-blog-gallery.mkdf-owl-slider .owl-nav .owl-prev',
	            '.mkdf-blog-holder article.format-gallery .mkdf-blog-gallery.mkdf-owl-slider .owl-nav .owl-next:hover',
	            '.mkdf-blog-holder article.format-gallery .mkdf-blog-gallery.mkdf-owl-slider .owl-nav .owl-prev:hover',
	            '.mkdf-blog-holder article.format-audio .mkdf-blog-audio-holder .mejs-container .mejs-controls>.mejs-time-rail .mejs-time-total .mejs-time-current',
	            '.mkdf-blog-holder article.format-audio .mkdf-blog-audio-holder .mejs-container .mejs-controls>a.mejs-horizontal-volume-slider .mejs-horizontal-volume-current',
	            '.mkdf-blog-single-navigation .mkdf-blog-single-prev .mkdf-blog-single-nav-mark',
	            '.mkdf-blog-single-navigation .mkdf-blog-single-next .mkdf-blog-single-nav-mark',
	            '.mkdf-side-menu-button-opener .mkdf-side-menu-icon',
	            '.mkdf-btn.mkdf-btn-simple:after',
	            '.mkdf-btn.mkdf-btn-simple:before',
	            '.mkdf-btn.mkdf-btn-solid',
	            '.mkdf-icon-shortcode.mkdf-circle',
	            '.mkdf-icon-shortcode.mkdf-dropcaps.mkdf-circle',
	            '.mkdf-icon-shortcode.mkdf-square',
	            '.mkdf-progress-bar .mkdf-pb-content-holder .mkdf-pb-content'
            );

            $woo_background_color_selector = array();
            if(wanderers_mkdf_is_woocommerce_installed()) {
                $woo_background_color_selector = array(
	                '.woocommerce-page .mkdf-content .wc-forward:not(.added_to_cart):not(.checkout-button)',
	                '.woocommerce-page .mkdf-content a.added_to_cart',
	                '.woocommerce-page .mkdf-content a.button',
	                '.woocommerce-page .mkdf-content button[type=submit]:not(.mkdf-woo-search-widget-button)',
	                '.woocommerce-page .mkdf-content input[type=submit]',
	                'div.woocommerce .wc-forward:not(.added_to_cart):not(.checkout-button)',
	                'div.woocommerce a.added_to_cart',
	                'div.woocommerce a.button',
	                'div.woocommerce button[type=submit]:not(.mkdf-woo-search-widget-button)',
	                'div.woocommerce input[type=submit]',
	                '.woocommerce .mkdf-onsale',
	                'ul.products>.product .added_to_cart',
	                'ul.products>.product .button',
	                '.mkdf-shopping-cart-holder .mkdf-header-cart .mkdf-cart-number',
	                '.mkdf-shopping-cart-dropdown .mkdf-cart-bottom .mkdf-view-cart'
                );
            }

            $background_color_selector = array_merge($background_color_selector, $woo_background_color_selector);

	        $background_color_important_selector = array(
		        '.mkdf-subsribe input[type=submit]:not(.mkdf-btn-custom-hover-bg):hover',
		        '.mkdf-btn.mkdf-btn-outline:not(.mkdf-btn-custom-hover-bg):hover',
		        '.mkdf-woo-single-page .mkdf-single-product-summary form.cart button'
	        );

            $border_color_selector = array(
	            '.mkdf-st-loader .pulse_circles .ball',
	            '.mkdf-owl-slider .owl-dots .owl-dot.active span',
	            '.mkdf-owl-slider .owl-dots .owl-dot:hover span',
	            '.mkdf-owl-slider+.mkdf-slider-thumbnail>.mkdf-slider-thumbnail-item.active img',
	            '#mkdf-back-to-top>span',
	            '.mkdf-btn.mkdf-btn-outline',
            );

	        $border_color_important_selector = array(
		        '.mkdf-subsribe input[type=submit]:not(.mkdf-btn-custom-border-hover):hover',
		        '.mkdf-btn.mkdf-btn-outline:not(.mkdf-btn-custom-border-hover):hover'
	        );

            echo wanderers_mkdf_dynamic_css($color_selector, array('color' => $first_main_color));
	        echo wanderers_mkdf_dynamic_css($color_important_selector, array('color' => $first_main_color.'!important'));
	        echo wanderers_mkdf_dynamic_css($fill_selector, array('fill' => $first_main_color));
	        echo wanderers_mkdf_dynamic_css($background_color_selector, array('background-color' => $first_main_color));
	        echo wanderers_mkdf_dynamic_css($background_color_important_selector, array('background-color' => $first_main_color.'!important'));
	        echo wanderers_mkdf_dynamic_css($border_color_selector, array('border-color' => $first_main_color));
	        echo wanderers_mkdf_dynamic_css($border_color_important_selector, array('border-color' => $first_main_color.'!important'));
        }
	
	    $page_background_color = wanderers_mkdf_options()->getOptionValue( 'page_background_color' );
	    if ( ! empty( $page_background_color ) ) {
		    $background_color_selector = array(
			    'body',
			    '.mkdf-content'
		    );
		    echo wanderers_mkdf_dynamic_css( $background_color_selector, array( 'background-color' => $page_background_color ) );
	    }
	
	    $selection_color = wanderers_mkdf_options()->getOptionValue( 'selection_color' );
	    if ( ! empty( $selection_color ) ) {
		    echo wanderers_mkdf_dynamic_css( '::selection', array( 'background' => $selection_color ) );
		    echo wanderers_mkdf_dynamic_css( '::-moz-selection', array( 'background' => $selection_color ) );
	    }
	
	    $preload_background_styles = array();
	
	    if ( wanderers_mkdf_options()->getOptionValue( 'preload_pattern_image' ) !== "" ) {
		    $preload_background_styles['background-image'] = 'url(' . wanderers_mkdf_options()->getOptionValue( 'preload_pattern_image' ) . ') !important';
	    }
	
	    echo wanderers_mkdf_dynamic_css( '.mkdf-preload-background', $preload_background_styles );
    }

    add_action('wanderers_mkdf_style_dynamic', 'wanderers_mkdf_design_styles');
}

if ( ! function_exists( 'wanderers_mkdf_content_styles' ) ) {
	function wanderers_mkdf_content_styles() {
		$content_style = array();
		
		$padding_top = wanderers_mkdf_options()->getOptionValue( 'content_top_padding' );
		if ( $padding_top !== '' ) {
			$content_style['padding-top'] = wanderers_mkdf_filter_px( $padding_top ) . 'px';
		}
		
		$content_selector = array(
			'.mkdf-content .mkdf-content-inner > .mkdf-full-width > .mkdf-full-width-inner',
		);
		
		echo wanderers_mkdf_dynamic_css( $content_selector, $content_style );
		
		$content_style_in_grid = array();
		
		$padding_top_in_grid = wanderers_mkdf_options()->getOptionValue( 'content_top_padding_in_grid' );
		if ( $padding_top_in_grid !== '' ) {
			$content_style_in_grid['padding-top'] = wanderers_mkdf_filter_px( $padding_top_in_grid ) . 'px';
		}
		
		$content_selector_in_grid = array(
			'.mkdf-content .mkdf-content-inner > .mkdf-container > .mkdf-container-inner',
		);
		
		echo wanderers_mkdf_dynamic_css( $content_selector_in_grid, $content_style_in_grid );
	}
	
	add_action( 'wanderers_mkdf_style_dynamic', 'wanderers_mkdf_content_styles' );
}

if ( ! function_exists( 'wanderers_mkdf_h1_styles' ) ) {
	function wanderers_mkdf_h1_styles() {
		$margin_top    = wanderers_mkdf_options()->getOptionValue( 'h1_margin_top' );
		$margin_bottom = wanderers_mkdf_options()->getOptionValue( 'h1_margin_bottom' );
		
		$item_styles = wanderers_mkdf_get_typography_styles( 'h1' );
		
		if ( $margin_top !== '' ) {
			$item_styles['margin-top'] = wanderers_mkdf_filter_px( $margin_top ) . 'px';
		}
		if ( $margin_bottom !== '' ) {
			$item_styles['margin-bottom'] = wanderers_mkdf_filter_px( $margin_bottom ) . 'px';
		}
		
		$item_selector = array(
			'h1'
		);
		
		if ( ! empty( $item_styles ) ) {
			echo wanderers_mkdf_dynamic_css( $item_selector, $item_styles );
		}
	}
	
	add_action( 'wanderers_mkdf_style_dynamic', 'wanderers_mkdf_h1_styles' );
}

if ( ! function_exists( 'wanderers_mkdf_h2_styles' ) ) {
	function wanderers_mkdf_h2_styles() {
		$margin_top    = wanderers_mkdf_options()->getOptionValue( 'h2_margin_top' );
		$margin_bottom = wanderers_mkdf_options()->getOptionValue( 'h2_margin_bottom' );
		
		$item_styles = wanderers_mkdf_get_typography_styles( 'h2' );
		
		if ( $margin_top !== '' ) {
			$item_styles['margin-top'] = wanderers_mkdf_filter_px( $margin_top ) . 'px';
		}
		if ( $margin_bottom !== '' ) {
			$item_styles['margin-bottom'] = wanderers_mkdf_filter_px( $margin_bottom ) . 'px';
		}
		
		$item_selector = array(
			'h2'
		);
		
		if ( ! empty( $item_styles ) ) {
			echo wanderers_mkdf_dynamic_css( $item_selector, $item_styles );
		}
	}
	
	add_action( 'wanderers_mkdf_style_dynamic', 'wanderers_mkdf_h2_styles' );
}

if ( ! function_exists( 'wanderers_mkdf_h3_styles' ) ) {
	function wanderers_mkdf_h3_styles() {
		$margin_top    = wanderers_mkdf_options()->getOptionValue( 'h3_margin_top' );
		$margin_bottom = wanderers_mkdf_options()->getOptionValue( 'h3_margin_bottom' );
		
		$item_styles = wanderers_mkdf_get_typography_styles( 'h3' );
		
		if ( $margin_top !== '' ) {
			$item_styles['margin-top'] = wanderers_mkdf_filter_px( $margin_top ) . 'px';
		}
		if ( $margin_bottom !== '' ) {
			$item_styles['margin-bottom'] = wanderers_mkdf_filter_px( $margin_bottom ) . 'px';
		}
		
		$item_selector = array(
			'h3'
		);
		
		if ( ! empty( $item_styles ) ) {
			echo wanderers_mkdf_dynamic_css( $item_selector, $item_styles );
		}
	}
	
	add_action( 'wanderers_mkdf_style_dynamic', 'wanderers_mkdf_h3_styles' );
}

if ( ! function_exists( 'wanderers_mkdf_h4_styles' ) ) {
	function wanderers_mkdf_h4_styles() {
		$margin_top    = wanderers_mkdf_options()->getOptionValue( 'h4_margin_top' );
		$margin_bottom = wanderers_mkdf_options()->getOptionValue( 'h4_margin_bottom' );
		
		$item_styles = wanderers_mkdf_get_typography_styles( 'h4' );
		
		if ( $margin_top !== '' ) {
			$item_styles['margin-top'] = wanderers_mkdf_filter_px( $margin_top ) . 'px';
		}
		if ( $margin_bottom !== '' ) {
			$item_styles['margin-bottom'] = wanderers_mkdf_filter_px( $margin_bottom ) . 'px';
		}
		
		$item_selector = array(
			'h4'
		);
		
		if ( ! empty( $item_styles ) ) {
			echo wanderers_mkdf_dynamic_css( $item_selector, $item_styles );
		}
	}
	
	add_action( 'wanderers_mkdf_style_dynamic', 'wanderers_mkdf_h4_styles' );
}

if ( ! function_exists( 'wanderers_mkdf_h5_styles' ) ) {
	function wanderers_mkdf_h5_styles() {
		$margin_top    = wanderers_mkdf_options()->getOptionValue( 'h5_margin_top' );
		$margin_bottom = wanderers_mkdf_options()->getOptionValue( 'h5_margin_bottom' );
		
		$item_styles = wanderers_mkdf_get_typography_styles( 'h5' );
		
		if ( $margin_top !== '' ) {
			$item_styles['margin-top'] = wanderers_mkdf_filter_px( $margin_top ) . 'px';
		}
		if ( $margin_bottom !== '' ) {
			$item_styles['margin-bottom'] = wanderers_mkdf_filter_px( $margin_bottom ) . 'px';
		}
		
		$item_selector = array(
			'h5'
		);
		
		if ( ! empty( $item_styles ) ) {
			echo wanderers_mkdf_dynamic_css( $item_selector, $item_styles );
		}
	}
	
	add_action( 'wanderers_mkdf_style_dynamic', 'wanderers_mkdf_h5_styles' );
}

if ( ! function_exists( 'wanderers_mkdf_h6_styles' ) ) {
	function wanderers_mkdf_h6_styles() {
		$margin_top    = wanderers_mkdf_options()->getOptionValue( 'h6_margin_top' );
		$margin_bottom = wanderers_mkdf_options()->getOptionValue( 'h6_margin_bottom' );
		
		$item_styles = wanderers_mkdf_get_typography_styles( 'h6' );
		
		if ( $margin_top !== '' ) {
			$item_styles['margin-top'] = wanderers_mkdf_filter_px( $margin_top ) . 'px';
		}
		if ( $margin_bottom !== '' ) {
			$item_styles['margin-bottom'] = wanderers_mkdf_filter_px( $margin_bottom ) . 'px';
		}
		
		$item_selector = array(
			'h6'
		);
		
		if ( ! empty( $item_styles ) ) {
			echo wanderers_mkdf_dynamic_css( $item_selector, $item_styles );
		}
	}
	
	add_action( 'wanderers_mkdf_style_dynamic', 'wanderers_mkdf_h6_styles' );
}

if ( ! function_exists( 'wanderers_mkdf_text_styles' ) ) {
	function wanderers_mkdf_text_styles() {
		$item_styles = wanderers_mkdf_get_typography_styles( 'text' );
		
		$item_selector = array(
			'p'
		);
		
		if ( ! empty( $item_styles ) ) {
			echo wanderers_mkdf_dynamic_css( $item_selector, $item_styles );
		}
	}
	
	add_action( 'wanderers_mkdf_style_dynamic', 'wanderers_mkdf_text_styles' );
}

if ( ! function_exists( 'wanderers_mkdf_link_styles' ) ) {
	function wanderers_mkdf_link_styles() {
		$link_styles      = array();
		$link_color       = wanderers_mkdf_options()->getOptionValue( 'link_color' );
		$link_font_style  = wanderers_mkdf_options()->getOptionValue( 'link_fontstyle' );
		$link_font_weight = wanderers_mkdf_options()->getOptionValue( 'link_fontweight' );
		$link_decoration  = wanderers_mkdf_options()->getOptionValue( 'link_fontdecoration' );
		
		if ( ! empty( $link_color ) ) {
			$link_styles['color'] = $link_color;
		}
		if ( ! empty( $link_font_style ) ) {
			$link_styles['font-style'] = $link_font_style;
		}
		if ( ! empty( $link_font_weight ) ) {
			$link_styles['font-weight'] = $link_font_weight;
		}
		if ( ! empty( $link_decoration ) ) {
			$link_styles['text-decoration'] = $link_decoration;
		}
		
		$link_selector = array(
			'a',
			'p a'
		);
		
		if ( ! empty( $link_styles ) ) {
			echo wanderers_mkdf_dynamic_css( $link_selector, $link_styles );
		}
	}
	
	add_action( 'wanderers_mkdf_style_dynamic', 'wanderers_mkdf_link_styles' );
}

if ( ! function_exists( 'wanderers_mkdf_link_hover_styles' ) ) {
	function wanderers_mkdf_link_hover_styles() {
		$link_hover_styles     = array();
		$link_hover_color      = wanderers_mkdf_options()->getOptionValue( 'link_hovercolor' );
		$link_hover_decoration = wanderers_mkdf_options()->getOptionValue( 'link_hover_fontdecoration' );
		
		if ( ! empty( $link_hover_color ) ) {
			$link_hover_styles['color'] = $link_hover_color;
		}
		if ( ! empty( $link_hover_decoration ) ) {
			$link_hover_styles['text-decoration'] = $link_hover_decoration;
		}
		
		$link_hover_selector = array(
			'a:hover',
			'p a:hover'
		);
		
		if ( ! empty( $link_hover_styles ) ) {
			echo wanderers_mkdf_dynamic_css( $link_hover_selector, $link_hover_styles );
		}
		
		$link_heading_hover_styles = array();
		
		if ( ! empty( $link_hover_color ) ) {
			$link_heading_hover_styles['color'] = $link_hover_color;
		}
		
		$link_heading_hover_selector = array(
			'h1 a:hover',
			'h2 a:hover',
			'h3 a:hover',
			'h4 a:hover',
			'h5 a:hover',
			'h6 a:hover'
		);
		
		if ( ! empty( $link_heading_hover_styles ) ) {
			echo wanderers_mkdf_dynamic_css( $link_heading_hover_selector, $link_heading_hover_styles );
		}
	}
	
	add_action( 'wanderers_mkdf_style_dynamic', 'wanderers_mkdf_link_hover_styles' );
}

if ( ! function_exists( 'wanderers_mkdf_smooth_page_transition_styles' ) ) {
	function wanderers_mkdf_smooth_page_transition_styles( $style ) {
		$id            = wanderers_mkdf_get_page_id();
		$loader_style  = array();
		$current_style = '';
		
		$background_color = wanderers_mkdf_get_meta_field_intersect( 'smooth_pt_bgnd_color', $id );
		if ( ! empty( $background_color ) ) {
			$loader_style['background-color'] = $background_color;
		}
		
		$loader_selector = array(
			'.mkdf-smooth-transition-loader'
		);
		
		if ( ! empty( $loader_style ) ) {
			$current_style .= wanderers_mkdf_dynamic_css( $loader_selector, $loader_style );
		}
		
		$spinner_style = array();
		$spinner_color = wanderers_mkdf_get_meta_field_intersect( 'smooth_pt_spinner_color', $id );
		if ( ! empty( $spinner_color ) ) {
			$spinner_style['background-color'] = $spinner_color;
			$spinner_style['fill'] = $spinner_color;
		}
		
		$spinner_selectors = array(
			'.mkdf-wanderer-loader path',
			'.mkdf-st-loader .mkdf-rotate-circles > div',
			'.mkdf-st-loader .pulse',
			'.mkdf-st-loader .double_pulse .double-bounce1',
			'.mkdf-st-loader .double_pulse .double-bounce2',
			'.mkdf-st-loader .cube',
			'.mkdf-st-loader .rotating_cubes .cube1',
			'.mkdf-st-loader .rotating_cubes .cube2',
			'.mkdf-st-loader .stripes > div',
			'.mkdf-st-loader .wave > div',
			'.mkdf-st-loader .two_rotating_circles .dot1',
			'.mkdf-st-loader .two_rotating_circles .dot2',
			'.mkdf-st-loader .five_rotating_circles .container1 > div',
			'.mkdf-st-loader .five_rotating_circles .container2 > div',
			'.mkdf-st-loader .five_rotating_circles .container3 > div',
			'.mkdf-st-loader .atom .ball-1:before',
			'.mkdf-st-loader .atom .ball-2:before',
			'.mkdf-st-loader .atom .ball-3:before',
			'.mkdf-st-loader .atom .ball-4:before',
			'.mkdf-st-loader .clock .ball:before',
			'.mkdf-st-loader .mitosis .ball',
			'.mkdf-st-loader .lines .line1',
			'.mkdf-st-loader .lines .line2',
			'.mkdf-st-loader .lines .line3',
			'.mkdf-st-loader .lines .line4',
			'.mkdf-st-loader .fussion .ball',
			'.mkdf-st-loader .fussion .ball-1',
			'.mkdf-st-loader .fussion .ball-2',
			'.mkdf-st-loader .fussion .ball-3',
			'.mkdf-st-loader .fussion .ball-4',
			'.mkdf-st-loader .wave_circles .ball',
			'.mkdf-st-loader .pulse_circles .ball'
		);
		
		if ( ! empty( $spinner_style ) ) {
			$current_style .= wanderers_mkdf_dynamic_css( $spinner_selectors, $spinner_style );
		}
		
		$current_style = $current_style . $style;
		
		return $current_style;
	}
	
	add_filter( 'wanderers_mkdf_add_page_custom_style', 'wanderers_mkdf_smooth_page_transition_styles' );
}