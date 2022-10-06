<li>
    <div class="<?php echo esc_attr( $comment_class ); ?>">
        <?php if ( ! $is_pingback_comment ) { ?>
            <div class="mkdf-comment-image"> <?php echo wanderers_mkdf_kses_img( get_avatar( $comment, 'thumbnail' ) ); ?> </div>
        <?php } ?>
        <div class="mkdf-comment-text">
            <div class="mkdf-comment-info">
                <h5 class="mkdf-comment-name vcard">
                    <?php echo wp_kses_post( get_comment_author_link() ); ?>
                </h5>
                <?php if ( ! $is_pingback_comment ) { ?>
                    <div class="mkdf-text-holder" id="comment-<?php comment_ID(); ?>">
                        <div class="mkdf-review-title">
                            <h6><?php echo esc_html( $review_title ); ?></h6>
                        </div>
                        <div class="mkdf-review-date">
                            <?php comment_date(); ?>
                        </div>
                        <?php comment_text(); ?>
                    </div>
                <?php } ?>
                <div class="mkdf-review-rating">
                    <?php foreach($rating_criteria as $rating) { ?>
                        <?php if(!isset($rating['show']) || (isset($rating['show']) && $rating['show'])) { ?>
                            <span class="mkdf-rating-inner">
                                <span class="mkdf-rating-label">
                                    <?php echo esc_html($rating['label']); ?>
                                </span>
                                <span class="mkdf-rating-value">
                                    <?php
                                        $review_rating = get_comment_meta( $comment->comment_ID, $rating['key'], true );
                                        for ( $i = 1; $i <= $review_rating; $i ++ ) { ?>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                    <?php } ?>
                                    <?php
                                        if($review_rating < 5){
                                            for ( $i = 1; $i <= 5 - $review_rating; $i ++ ) { ?>
                                                <i class="fa fa-star-o" aria-hidden="true"></i>
                                            <?php }
                                        }
                                    ?>
                                </span>
                            </span>
                        <?php } ?>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
<!-- li is closed by wordpress after comment rendering -->