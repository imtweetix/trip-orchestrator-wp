<?php

if ( ! function_exists( 'wanderers_mkdf_set_search_covers_header_global_option' ) ) {
    /**
     * This function set search type value for search options map
     */
    function wanderers_mkdf_set_search_covers_header_global_option( $search_type_options ) {
        $search_type_options['covers-header'] = esc_html__( 'Covers Header', 'wanderers' );

        return $search_type_options;
    }

    add_filter( 'wanderers_mkdf_search_type_global_option', 'wanderers_mkdf_set_search_covers_header_global_option' );
}