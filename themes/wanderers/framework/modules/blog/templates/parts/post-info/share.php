<?php
$share_type = isset($share_type) ? $share_type : 'list';
?>
<?php if( wanderers_mkdf_core_plugin_installed() && wanderers_mkdf_options()->getOptionValue('enable_social_share') === 'yes' && wanderers_mkdf_options()->getOptionValue('enable_social_share_on_post') === 'yes') { ?>
    <div class="mkdf-blog-share">
        <?php echo wanderers_mkdf_get_social_share_html(array('type' => $share_type)); ?>
    </div>
<?php } ?>