<?php
$month = get_the_time('m');
$year = get_the_time('Y');
$title = get_the_title();
?>
<div itemprop="dateCreated" class="mkdf-post-info-date entry-date published updated">
    <?php if(empty($title) && wanderers_mkdf_blog_item_has_link()) { ?>
        <a itemprop="url" href="<?php the_permalink() ?>">
    <?php } else { ?>
        <a itemprop="url" href="<?php echo get_month_link($year, $month); ?>">
    <?php } ?>

        <span class="icon_calendar"></span> <?php the_time(get_option('date_format')); ?>
        </a>
    <meta itemprop="interactionCount" content="UserComments: <?php echo get_comments_number(wanderers_mkdf_get_page_id()); ?>"/>
</div>