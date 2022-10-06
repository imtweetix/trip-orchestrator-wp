<?php
$post_classes = get_post_class();
$post_classes[] = get_post_meta(get_the_ID(), 'mkdf_post_skin', true);
?>

<article id="post-<?php the_ID(); ?>" class="<?php echo implode(' ', $post_classes); ?>">
    <div class="mkdf-post-content">
        <div class="mkdf-post-text" style="background-image:url('<?php echo get_the_post_thumbnail_url(); ?> ')">
            <div class="mkdf-post-text-inner">
                <div class="mkdf-post-text-main">
                    <?php wanderers_mkdf_get_module_template_part('templates/parts/post-type/link', 'blog', '', $part_params); ?>
                </div>
                <div class="mkdf-post-info-bottom clearfix">
                    <div class="mkdf-post-info-bottom-left">
                        <?php wanderers_mkdf_get_module_template_part('templates/parts/post-info/date', 'blog', '', $part_params); ?>
                        <?php wanderers_mkdf_get_module_template_part('templates/parts/post-info/comments', 'blog', '', $part_params); ?>
                        <?php wanderers_mkdf_get_module_template_part('templates/parts/post-info/category', 'blog', '', $part_params); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="mkdf-post-additional-content">
        <?php the_content(); ?>
        <div class="mkdf-post-info-bottom clearfix">
            <div class="mkdf-post-info-bottom-left">
			    <?php wanderers_mkdf_get_module_template_part('templates/parts/post-info/date', 'blog', '', $part_params); ?>
			    <?php wanderers_mkdf_get_module_template_part('templates/parts/post-info/like', 'blog', '', $part_params); ?>
			    <?php wanderers_mkdf_get_module_template_part('templates/parts/post-info/comments', 'blog', '', $part_params); ?>
			    <?php wanderers_mkdf_get_module_template_part('templates/parts/post-info/category', 'blog', '', $part_params); ?>

            </div>
            <div class="mkdf-post-info-bottom-right">
	            <?php if(wanderers_mkdf_options()->getOptionValue( 'blog_tags' ) == 'yes') {
		            wanderers_mkdf_get_module_template_part( 'templates/parts/post-info/tags', 'blog', '', $part_params );
	            } ?>
			    <?php wanderers_mkdf_get_module_template_part('templates/parts/post-info/share', 'blog', '', $part_params); ?>
            </div>
        </div>
    </div>
</article>