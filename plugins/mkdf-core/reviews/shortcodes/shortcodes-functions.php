<?php

if ( ! function_exists( 'mkdf_core_include_reviews_shortcodes_files' ) ) {
    /**
     * Loades all shortcodes by going through all folders that are placed directly in shortcodes folder
     */
    function mkdf_core_include_reviews_shortcodes_files() {
        foreach ( glob( MIKADO_CORE_ABS_PATH . '/reviews/shortcodes/*/load.php' ) as $shortcode_load ) {
            include_once $shortcode_load;
        }
    }

    add_action( 'mkdf_core_action_include_shortcodes_file', 'mkdf_core_include_reviews_shortcodes_files' );
}