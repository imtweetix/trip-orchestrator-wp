<?php if($icon_animation_holder) : ?>
    <span class="mkdf-icon-animation-holder" <?php wanderers_mkdf_inline_style($icon_animation_holder_styles); ?>>
<?php endif; ?>
    <span <?php wanderers_mkdf_class_attribute($icon_holder_classes); ?> <?php wanderers_mkdf_inline_style($icon_holder_styles); ?> <?php echo wanderers_mkdf_get_inline_attrs($icon_holder_data); ?>>
        <?php if(!empty($link)) : ?>
            <a itemprop="url" class="<?php echo esc_attr($link_class) ?>" href="<?php echo esc_url($link); ?>" target="<?php echo esc_attr($target); ?>">
        <?php endif; ?>
            <?php echo wanderers_mkdf_icon_collections()->renderIcon($icon, $icon_pack, $icon_params); ?>
        <?php if(!empty($link)) : ?>
            </a>
        <?php endif; ?>
    </span>
<?php if($icon_animation_holder) : ?>
    </span>
<?php endif; ?>
