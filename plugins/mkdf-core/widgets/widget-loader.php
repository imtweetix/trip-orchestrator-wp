<?php

if ( ! function_exists( 'mkdf_core_register_widgets' ) ) {
    function mkdf_core_register_widgets() {
        $widgets = apply_filters( 'mkdf_core_filter_register_widgets', $widgets = array() );

        foreach ( $widgets as $widget ) {
            register_widget( $widget );
        }
    }

    add_action( 'widgets_init', 'mkdf_core_register_widgets' );
}