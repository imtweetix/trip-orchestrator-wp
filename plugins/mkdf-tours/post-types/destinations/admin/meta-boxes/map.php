<?php

if ( ! function_exists( 'mkdf_destinations_destinations_meta' ) ) {
    function mkdf_destinations_destinations_meta()
    {
        global $post;

        $destinations_meta_box = wanderers_mkdf_create_meta_box(
            array(
                'scope' => apply_filters('wanderers_mkdf_set_scope_for_meta_boxes', array('destinations'), 'destination_options'),
                'title' => esc_html__('Destination Options', 'mkdf-tours'),
                'name' => 'destination_options'
            )
        );

        wanderers_mkdf_create_meta_box_field(
            array(
                'name'          => 'mkdf_destionations_custom_label',
                'type'          => 'text',
                'default_value' => '',
                'label'         => esc_html__( 'Custom Label', 'mkdf-tours' ),
                'description'   => esc_html__( 'Define custom label which will show on destination lists', 'mkdf-tours' ),
                'parent'        => $destinations_meta_box
            )
        );

        wanderers_mkdf_add_admin_section_title(
            array(
                'name'   => 'masonry_section_title',
                'parent' => $destinations_meta_box,
                'title'  => esc_html__( 'Destination Icon', 'mkdf-tours' )
            )
        );

        wanderers_mkdf_create_meta_box_field(
            array(
                'name'      => 'mkdf_destination_use_custom_icon',
                'type'      => 'yesno',
                'label'     => esc_html__('Use Custom Icon?', 'mkdf-tours'),
                'default'   => 'no',
                'parent'    => $destinations_meta_box
            )
        );

        wanderers_mkdf_create_meta_box_field(
            array(
                'name'        => 'mkdf_destination_icon',
                'type'        => 'icon',
                'label'       => esc_html__( 'Choose Icon', 'mkdf-tours' ),
                'description' => esc_html__('Choose icon from icon pack for destination.', 'mkdf-tours'),
                'parent'      => $destinations_meta_box,
                'dependency' => array(
                    'hide' => array(
                        'mkdf_destination_use_custom_icon' => 'yes'
                    )
                )
            )
        );

        wanderers_mkdf_create_meta_box_field(
            array(
                'name'        => 'mkdf_destination_custom_icon',
                'type'        => 'image',
                'label'       => esc_html__( 'Custom Image', 'mkdf-tours' ),
                'description' => esc_html__('Choose custom image for destination.', 'mkdf-tours'),
                'parent'      => $destinations_meta_box,
                'dependency' => array(
                    'hide' => array(
                        'mkdf_destination_use_custom_icon' => array('no', '')
                    )
                )
            )
        );

        $masonry_section_container = wanderers_mkdf_add_admin_container(
            array(
                'type'   => 'container',
                'name'   => 'masonry_section_container',
                'parent' => $destinations_meta_box
            )
        );

        wanderers_mkdf_add_admin_section_title(
            array(
                'name'   => 'masonry_section_title',
                'parent' => $masonry_section_container,
                'title'  => esc_html__( 'Masonry List Settings', 'mkdf-tours' )
            )
        );

        wanderers_mkdf_create_meta_box_field(
            array(
                'name'          => 'mkdf_destinations_masonry_dimensions',
                'type'          => 'select',
                'default_value' => '',
                'label'         => esc_html__( 'Masonry Dimensions', 'mkdf-tours' ),
                'options'       => array(
                    'default'            => esc_html__( 'Default', 'mkdf-tours' ),
                    'square'             => esc_html__( 'Square', 'mkdf-tours' ),
                    'large-width'        => esc_html__( 'Large Width', 'mkdf-tours' ),
                    'large-height'       => esc_html__( 'Large Height', 'mkdf-tours' ),
                    'large-width-height' => esc_html__( 'Large Width/Height', 'mkdf-tours' )
                ),
                'parent'        => $masonry_section_container
            )
        );
        
    }

    add_action( 'wanderers_mkdf_meta_boxes_map', 'mkdf_destinations_destinations_meta', 10 );
}