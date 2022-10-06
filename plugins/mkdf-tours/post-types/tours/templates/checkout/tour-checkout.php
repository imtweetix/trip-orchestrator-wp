<?php get_header(); ?>
<?php wanderers_mkdf_get_title(); ?>
<?php do_action('wanderers_mkdf_before_main_content'); ?>
<div class="mkdf-tours-checkout-page-holder">
    <?php if (have_posts()) : while (have_posts()) :  the_post(); ?>
        <div class="mkdf-tours-checkout-page-content">

            <?php the_content(); ?>

        </div>

        <?php echo mkdf_tours_get_checkout_page_content(); ?>
    <?php endwhile; endif; ?>
</div>
<?php get_footer(); ?>
