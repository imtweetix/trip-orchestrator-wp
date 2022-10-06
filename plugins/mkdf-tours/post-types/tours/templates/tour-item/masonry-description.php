<?php
if (!isset($title_tag) || $title_tag == ''){
	$title_tag = 'h4';
}

$id = get_the_ID();
$image_size = get_post_meta($id, 'mkdf_tours_masonry_dimensions', true);
$image_dimension = mkdf_tours_get_image_size_param(array('image_size' => $image_size));
$item_classes = array(
    'mkdf-tours-masonry-item',
    'mkdf-tours-row-item',
    'mkdf-item-space',
    mkdf_tours_get_tour_rating_class(),
    mkdf_tours_get_tour_masonry_class()
);
?>
<div <?php post_class($item_classes); ?>>
    <div class="mkdf-tours-gim-holder-inner">
        <div class="mkdf-tours-gim-content-outer">
            <div class="mkdf-tours-gim-content-inner">
                <div class="mkdf-tours-gim-title-holder">
                    <<?php echo esc_attr($title_tag);?> class="mkdf-tour-title">
                        <?php the_title(); ?>
                    </<?php echo esc_attr($title_tag);?>>
                    <span class="mkdf-tours-gallery-item-price-holder">
                        <?php echo mkdf_tours_get_tour_price_html(); ?>
                    </span>
                </div>
                <?php if(mkdf_tours_get_tour_excerpt()) : ?>
                    <div class="mkdf-tours-gim-excerpt">
                        <div class="mkdf-tours-gim-excerpt-inner">
                            <?php echo mkdf_tours_get_tour_excerpt($text_length); ?>
                        </div>
                    </div>
                <?php endif; ?>
                <div class="mkdf-tours-gim-button">
                    <?php echo mkdf_tours_get_tour_button(); ?>
                </div>
            </div>
        </div>
        <a class="mkdf-tours-masonry-item-link" href="<?php the_permalink(); ?>"></a>
    </div>
</div>