<?php if(is_array($post_ratings) && count($post_ratings)) { ?>
    <?php $average_rating_total = mkdf_core_get_total_average_rating($post_ratings); ?>
    <div class="mkdf-reviews-list-info mkdf-reviews-per-criteria">
        <div class="mkdf-item-reviews-display-wrapper clearfix">
            <?php if(!empty($title)) { ?>
                <h3 class="mkdf-item-review-title"><?php echo esc_html($title); ?></h3>
            <?php } ?>

            <?php if(!empty($subtitle)) { ?>
                <p class="mkdf-item-review-subtitle"><?php echo esc_html($subtitle); ?></p>
            <?php } ?>

            <div class="mkdf-reviews-wrapper-inner">
                <div class="mkdf-reviews-average">
                    <div class="mkdf-item-reviews-average-wrapper">
                        <div class="mkdf-item-reviews-average-rating">
                            <?php echo esc_html(mkdf_core_reviews_format_rating_output($average_rating_total)); ?>
                        </div>
                        <div class="mkdf-item-reviews-verbal-description">
                            <h4 class="mkdf-item-reviews-rating-description">
                                <?php echo esc_html(mkdf_core_reviews_get_description_for_rating($average_rating_total)); ?>
                            </h4>
                        </div>
                    </div>
                </div>
                <div class="mkdf-rating-percentage">
                    <div class="mkdf-rating-percentage-wrapper">
                        <?php
                        foreach($post_ratings as $rating) {
                            $percentage = mkdf_core_post_average_rating_per_criteria($rating);
                            echo do_shortcode( '[mkdf_progress_bar percent="' . $percentage . '" title="' . $rating['label'] . '" title_tag="p"]' );
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php }