<?php
extract($tour_sections);
?>
<div class="mkdf-tour-tabs mkdf-horizontal mkdf-tab-text">
    <ul class="mkdf-tabs-nav clearfix">
        <?php foreach ($tour_sections as $section) {

            if ($section['value'] === 'yes') { ?>

                <li class="mkdf-tour-nav-item">

                    <a href="<?php echo esc_attr($section['id']) ?>">

                        <span class="mkdf-tour-nav-section-icon <?php echo esc_attr($section['icon']) ?>"></span>

                        <span class="mkdf-tour-nav-section-title">
                            <?php echo esc_html($section['title']) ?>
                        </span>

                    </a>
                </li>

        <?php }
        }; ?>
    </ul>
</div>
<div class="mkdf-grid-row-medium-gutter">
    <div class="mkdf-grid-col-9">
        <article class="mkdf-tour-item-wrapper">

            <?php if ($show_info_section['value'] === 'yes') { ?>

                <div class="mkdf-tour-item-section mkdf-tab-container" id="<?php echo esc_attr($show_info_section['id']) ?>">

                    <?php mkdf_tours_get_tour_info_part('tour-info-parts/title'); ?>
                    <div class="mkdf-tour-item-short-info">
                        <?php mkdf_tours_get_tour_info_part('tour-info-parts/years'); ?>
                        <?php mkdf_tours_get_tour_info_part('tour-info-parts/destination'); ?>
                        <?php mkdf_tours_get_tour_info_part('tour-info-parts/categories'); ?>
                    </div>
                    <?php mkdf_tours_get_tour_info_part('tour-info-parts/content'); ?>
                    <?php echo mkdf_core_list_review_details('simple-overall'); ?>
                    <?php mkdf_tours_get_tour_info_part('tour-info-parts/main-info'); ?>
                    <?php mkdf_tours_get_tour_info_part('tour-info-parts/gallery'); ?>

                </div>

            <?php } ?>

            <?php if ($show_tour_plan_section['value'] === 'yes') { ?>

                <div class="mkdf-tour-item-section mkdf-tab-container" id="<?php echo esc_attr($show_tour_plan_section['id']) ?>">
                    <?php mkdf_tours_get_tour_info_part('tour-plan-parts/plan'); ?>
                </div>

            <?php } ?>

            <?php if ($show_location_section['value'] === 'yes') { ?>

                <div class="mkdf-tour-item-section mkdf-tab-container" id="<?php echo esc_attr($show_location_section['id']) ?>">
                    <?php mkdf_tours_get_tour_info_part('tour-location-parts/location'); ?>
                </div>

            <?php } ?>

            <?php if ($show_gallery_section['value'] === 'yes') { ?>

                <div class="mkdf-tour-item-section mkdf-tab-container" id="<?php echo esc_attr($show_gallery_section['id']) ?>">
                    <?php mkdf_tours_get_tour_info_part('tour-gallery-parts/gallery'); ?>
                </div>

            <?php } ?>

            <?php if ($show_review_section['value'] === 'yes') { ?>

                <div class="mkdf-tour-item-section mkdf-tab-container" id="<?php echo esc_attr($show_review_section['id']) ?>">
                    <?php mkdf_tours_get_tour_info_part('tour-review-parts/reviews'); ?>
                </div>

            <?php } ?>

            <?php if ($show_custom_section_1['value'] === 'yes') { ?>

                <div class="mkdf-tour-item-section mkdf-tab-container" id="<?php echo esc_attr($show_custom_section_1['id']) ?>">
                    <?php mkdf_tours_get_tour_info_part('tour-custom1-parts/custom'); ?>
                </div>

            <?php } ?>

            <?php if ($show_custom_section_2['value'] === 'yes') { ?>

                <div class="mkdf-tour-item-section mkdf-tab-container" id="<?php echo esc_attr($show_custom_section_2['id']) ?>">
                    <?php mkdf_tours_get_tour_info_part('tour-custom2-parts/custom'); ?>
                </div>

            <?php } ?>

        </article>
    </div>
    <div class=" mkdf-grid-col-3">
        <aside class="mkdf-sidebar">
            <div class="widget mkdf-tours-booking-form-holder">
                <?php if (mkdf_tours_is_tour_bookable()) : ?>
                    <?php echo mkdf_tours_get_tour_module_template_part('single/booking-form', 'tours', 'templates', '', $params); ?>
                <?php endif; ?>
            </div>
            <?php
            if (wanderers_mkdf_get_sidebar() !== 'sidebar') {
                dynamic_sidebar(wanderers_mkdf_get_sidebar());
            } else {
                dynamic_sidebar('tour-single-sidebar');
            }
            ?>
        </aside>
    </div>
</div>
