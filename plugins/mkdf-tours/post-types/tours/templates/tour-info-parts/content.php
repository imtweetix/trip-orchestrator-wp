<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <div class="mkdf-info-section-part mkdf-tour-item-content">
            <?php the_content(); ?>
        </div>
<?php endwhile;
endif; ?>

<?php
$button1 = get_field('button_1');
$button2 = get_field('button_2');
?>
<div class="mkdf-info-section-part mkdf-tour-item-button-part mkdf-tour-tabs clearfix">
    <ul class="mkdf-tour-item-footer-buttons mkdf-tabs-nav">
        <li class="mkdf-tour-nav-item"><a href="tour-item-plan-id" class="mkdf-btn mkdf-btn-medium mkdf-btn-solid"><?php echo esc_html__('Day-by-Day', 'mkdf-tours'); ?></a></li>

        <?php if ($button1) : ?>
            <li><a href="<?php echo esc_url($button1['url']); ?>" class="mkdf-btn mkdf-btn-medium mkdf-btn-solid" target="<?php echo esc_attr($button1['target'] ? $button1['target'] : '_self'); ?>"><?php echo esc_html__($button1['title'], 'mkdf-tours'); ?></a></li>
        <?php endif; ?>

        <?php if ($button2) : ?>
            <li><a href="<?php echo esc_url($button2['url']); ?>" class="mkdf-btn mkdf-btn-medium mkdf-btn-solid" target="<?php echo esc_attr($button2['target'] ? $button2['target'] : '_self'); ?>"><?php echo esc_html__($button2['title'], 'mkdf-tours'); ?></a></li>
        <?php endif; ?>

    </ul>
</div>
