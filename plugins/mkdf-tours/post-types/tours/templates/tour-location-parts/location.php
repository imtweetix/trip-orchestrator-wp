<?php
$location_excerpt              = get_post_meta(get_the_ID(), 'mkdf_tours_location_excerpt', true);
$location_content              = get_post_meta(get_the_ID(), 'mkdf_tours_location_content', true);
$google_map_params             = array(
	//'custom_map_style' => 'no',
	'location_map'     => 'yes',
    'map_height'       => '505',
    'zoom'             => '10'
);
$google_map_params['address1'] = get_post_meta(get_the_ID(), 'mkdf_tours_location_address1', true);
$google_map_params['address2'] = get_post_meta(get_the_ID(), 'mkdf_tours_location_address2', true);
$google_map_params['address3'] = get_post_meta(get_the_ID(), 'mkdf_tours_location_address3', true);
$google_map_params['address4'] = get_post_meta(get_the_ID(), 'mkdf_tours_location_address4', true);
$google_map_params['address5'] = get_post_meta(get_the_ID(), 'mkdf_tours_location_address5', true);
$google_map_params['address5'] = get_post_meta(get_the_ID(), 'mkdf_tours_location_address5', true);


///
$google_map_params['snazzy_map_style'] = 'yes';
$google_map_params['snazzy_map_code'] = "`{`
                                            {
                                            ``featureType``: ``administrative``,
                                            ``elementType``: ``labels.text.fill``,
                                            ``stylers``: `{`
                                            {
                                            ``color``: ``#444444``
                                            }
                                            `}`
                                            },
                                            {
                                            ``featureType``: ``landscape``,
                                            ``elementType``: ``all``,
                                            ``stylers``: `{`
                                            {
                                            ``color``: ``#f2f2f2``
                                            }
                                            `}`
                                            },
                                            {
                                            ``featureType``: ``poi``,
                                            ``elementType``: ``all``,
                                            ``stylers``: `{`
                                            {
                                            ``visibility``: ``off``
                                            }
                                            `}`
                                            },
                                            {
                                            ``featureType``: ``road``,
                                            ``elementType``: ``all``,
                                            ``stylers``: `{`
                                            {
                                            ``saturation``: -100
                                            },
                                            {
                                            ``lightness``: 45
                                            }
                                            `}`
                                            },
                                            {
                                            ``featureType``: ``road.highway``,
                                            ``elementType``: ``all``,
                                            ``stylers``: `{`
                                            {
                                            ``visibility``: ``simplified``
                                            }
                                            `}`
                                            },
                                            {
                                            ``featureType``: ``road.highway``,
                                            ``elementType``: ``geometry.fill``,
                                            ``stylers``: `{`
                                            {
                                            ``color``: ``#c4c4c4``
                                            }
                                            `}`
                                            },
                                            {
                                            ``featureType``: ``road.arterial``,
                                            ``elementType``: ``labels.icon``,
                                            ``stylers``: `{`
                                            {
                                            ``visibility``: ``off``
                                            }
                                            `}`
                                            },
                                            {
                                            ``featureType``: ``transit``,
                                            ``elementType``: ``all``,
                                            ``stylers``: `{`
                                            {
                                            ``visibility``: ``off``
                                            }
                                            `}`
                                            },
                                            {
                                            ``featureType``: ``water``,
                                            ``elementType``: ``all``,
                                            ``stylers``: `{`
                                            {
                                            ``color``: ``#ffcc05``
                                            },
                                            {
                                            ``visibility``: ``on``
                                            }
                                            `}`
                                            },
                                            {
                                            ``featureType``: ``water``,
                                            ``elementType``: ``geometry.fill``,
                                            ``stylers``: `{`
                                            {
                                            ``hue``: ``#ffcc05``
                                            }
                                            `}`
                                            }
                                        `}`";


?>

<div class="mkdf-location-part">

    <h3 class="mkdf-tour-location">
        <?php esc_html_e('Tour Location', 'mkdf-tours'); ?>
    </h3>

    <p class="mkdf-location-excerpt">
        <?php echo esc_html($location_excerpt) ?>
    </p>

    <div class="mkdf-location-addresses">
        <?php
        if(count($google_map_params)) {
            echo wanderers_mkdf_execute_shortcode('mkdf_google_map', $google_map_params);
        }
        ?>
    </div>

    <div class="mkdf-location-content">
        <?php echo do_shortcode($location_content); ?>
    </div>

</div>