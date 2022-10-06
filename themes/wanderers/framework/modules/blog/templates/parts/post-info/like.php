<?php if(wanderers_mkdf_core_plugin_installed()) { ?>
    <div class="mkdf-blog-like">
        <?php if( function_exists('wanderers_mkdf_get_like') ) wanderers_mkdf_get_like(); ?>
    </div>
<?php } ?>