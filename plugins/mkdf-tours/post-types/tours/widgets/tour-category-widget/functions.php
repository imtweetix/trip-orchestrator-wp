<?php
if(!function_exists('mkdf_tours_register_tour_categories_widget')) {
    /**
     * Function that register tour list widget
     */
    function mkdf_tours_register_tour_categories_widget($widgets) {
        $widgets[] = 'WanderersMkdfTourCategoriesWidget';

        return $widgets;
    }

    add_filter('mkdf_core_filter_register_widgets', 'mkdf_tours_register_tour_categories_widget');
}

