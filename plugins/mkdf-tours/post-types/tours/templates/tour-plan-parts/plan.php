<?php

$tour_plan = get_post_meta(get_the_ID(), 'mkdf_tour_plan_repeater', true);
$button1 = get_field('button_1');
$button2 = get_field('button_2');

if (is_array($tour_plan) && count($tour_plan)) { ?>

    <h3 class="mkdf-tour-plan-title"> <?php echo esc_html__('Tour Plan', 'mkdf-tours'); ?> </h3>

    <?php foreach ($tour_plan as $i => $tour_plan_item) { ?>

        <div class="mkdf-info-section-part mkdf-tour-item-plan-part clearfix">
            <div class="mkdf-route-top-holder">
                <div class="mkdf-route-id"><?php echo esc_html__('Day ' . $i + 1, 'mkdf-tours'); ?></div>
                <h6 class="mkdf-tour-item-plan-part-title">
                    <?php echo esc_attr($tour_plan_item['plan_section_title']); ?>
                </h6>
            </div>
            <div class="mkdf-tour-item-plan-part-description">
                <?php
                echo do_shortcode($tour_plan_item['plan_section_description']);
                ?>
            </div>

        </div>

<?php }
}

?>

<div class="mkdf-info-section-part mkdf-tour-item-button-part mkdf-tour-tabs clearfix">
    <ul class="mkdf-tour-item-footer-buttons">
        <li><a href="tour-item-info-id" class="mkdf-btn mkdf-btn-medium mkdf-btn-solid"><?php echo esc_html__('Overview', 'mkdf-tours'); ?></a></li>

        <?php if ($button1) : ?>
            <li><a href="<?php echo esc_url($button1['url']); ?>" class="mkdf-btn mkdf-btn-medium mkdf-btn-solid" target="<?php echo esc_attr($button1['target'] ? $button1['target'] : '_self'); ?>"><?php echo esc_html__($button1['title'], 'mkdf-tours'); ?></a></li>
        <?php endif; ?>

        <?php if ($button2) : ?>
            <li><a href="<?php echo esc_url($button2['url']); ?>" class="mkdf-btn mkdf-btn-medium mkdf-btn-solid" target="<?php echo esc_attr($button2['target'] ? $button2['target'] : '_self'); ?>"><?php echo esc_html__($button2['title'], 'mkdf-tours'); ?></a></li>
        <?php endif; ?>

    </ul>
</div>
