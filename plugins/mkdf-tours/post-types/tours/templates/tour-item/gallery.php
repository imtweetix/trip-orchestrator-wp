<?php
if (!isset($title_tag) || $title_tag == '') {
    $title_tag = 'h4';
}
?>
<div <?php post_class(array('mkdf-tours-gallery-item mkdf-tours-row-item mkdf-item-space', mkdf_tours_get_tour_rating_class())); ?>>
    <?php if (has_post_thumbnail()) : ?>
        <div class="mkdf-tours-gallery-item-image-holder">
            <div class="mkdf-tours-gallery-item-image">
                <?php echo mkdf_tours_get_tour_image_html($thumb_size); ?>

                <div class="mkdf-tours-gallery-item-content-holder">
                    <div class="mkdf-tours-gallery-item-content-inner">
                        <div class="mkdf-tours-gallery-main-info">
                            <div class="mkdf-tours-gallery-title-holder">
                                <<?php echo esc_attr($title_tag); ?> class="mkdf-tour-title">
                                    <?php the_title(); ?>
                                </<?php echo esc_attr($title_tag); ?>>
                                <?php if (mkdf_tours_get_tour_label_html()) : ?>
                                    <span class="mkdf-tours-gallery-item-label-holder">
                                        <?php echo mkdf_tours_get_tour_label_html(); ?>
                                    </span>
                                <?php endif; ?>
                            </div>
                            <?php if (mkdf_tours_get_tour_excerpt()) : ?>
                                <div class="mkdf-tours-gallery-item-excerpt">
                                    <div class="mkdf-tours-gallery-item-excerpt-inner">
                                        <?php echo mkdf_tours_get_tour_excerpt($text_length); ?>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>
                        <span class="mkdf-tours-gallery-item-price-holder">
                            <?php echo mkdf_tours_get_tour_price_html(); ?>
                        </span>
                    </div>
                </div>
            </div>
            <a class="mkdf-tours-gallery-item-link" href="<?php the_permalink(); ?>"></a>
        </div>
    <?php endif; ?>
</div>
