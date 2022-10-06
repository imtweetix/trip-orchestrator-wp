<?php
    $review_title   = get_post_meta(wanderers_mkdf_get_page_id(), 'mkdf_tours_reviews_title', true);
    $review_excerpt = get_post_meta(wanderers_mkdf_get_page_id(), 'mkdf_tours_reviews_excerpt', true);

?>

<div class="mkdf-tours-reviews-list-top">
    <?php if(!empty($review_title)) { ?>
        <h3 class="mkdf-tours-review-title"> <?php echo esc_html($review_title); ?> </h3>
    <?php } ?>
    <?php if(!empty($review_title)) { ?>
        <p class="mkdf-tours-review-excerpt"> <?php echo esc_html($review_excerpt); ?> </p>
    <?php } ?>
    <?php
    if(wanderers_mkdf_core_plugin_installed()) {
        echo mkdf_core_list_review_details('per-criteria');
    }
    ?>
</div>
<?php
comments_template('', true);