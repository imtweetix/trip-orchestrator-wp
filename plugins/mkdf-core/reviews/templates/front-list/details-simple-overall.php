<div class="mkdf-reviews-list-info mkdf-reviews-simple">
    <div class="mkdf-reviews-number-wrapper">
        <span class="mkdf-stars-wrapper">
            <span class="mkdf-stars-wrapper-inner">
                <span class="mkdf-stars-items">
                    <?php
                    $review_rating = mkdf_core_get_total_average_rating($post_ratings);
                    for ($i = 1; $i <= $review_rating; $i++) { ?>
                        <i class="fa fa-star" aria-hidden="true"></i>
                    <?php } ?>
                    <?php
                        if($review_rating < 5){
                            if($review_rating < 1){
                                $review_rating = 0;
                            }
                            for ($i = 1; $i <= 5 - floor($review_rating); $i++) { ?>
                                <i class="fa fa-star-o" aria-hidden="true"></i>
                            <?php }
                        }
                    ?>
                </span>
                <div class="mkdf-reviews-summary">
                     <span class="mkdf-reviews-number">
                        <?php echo esc_html($rating_number); ?>
                    </span>
                    <span class="mkdf-reviews-label">
                        <?php echo esc_html($rating_label); ?>
                    </span>
                </div>
            </span>
        </span>
    </div>
</div>