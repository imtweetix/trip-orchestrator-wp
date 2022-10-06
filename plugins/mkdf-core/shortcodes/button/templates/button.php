<button type="submit" <?php wanderers_mkdf_inline_style($button_styles); ?> <?php wanderers_mkdf_class_attribute($button_classes); ?> <?php echo wanderers_mkdf_get_inline_attrs($button_data); ?> <?php echo wanderers_mkdf_get_inline_attrs($button_custom_attrs); ?>>
    <span class="mkdf-btn-text"><?php echo esc_html($text); ?></span>
    <?php echo wanderers_mkdf_icon_collections()->renderIcon($icon, $icon_pack); ?>
</button>