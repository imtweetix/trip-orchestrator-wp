<li class="mkdf-bl-item mkdf-item-space clearfix">
	<div class="mkdf-bli-inner">
		<?php if ( $post_info_image == 'yes' ) {
			wanderers_mkdf_get_module_template_part( 'templates/parts/media', 'blog', '', $params );
		} ?>
        <div class="mkdf-bli-content">
	        <?php
            wanderers_mkdf_get_module_template_part( 'templates/parts/title', 'blog', '', $params );
            wanderers_mkdf_get_module_template_part( 'templates/parts/excerpt', 'blog', '', $params );
			?>

			<?php if ($post_info_section == 'yes') { ?>
				<div class="mkdf-bli-info">
					<?php
					if ( $post_info_date == 'yes' ) {
						wanderers_mkdf_get_module_template_part( 'templates/parts/post-info/date', 'blog', '', $params );
					}
					if ( $post_info_category == 'yes' ) {
						wanderers_mkdf_get_module_template_part( 'templates/parts/post-info/category', 'blog', '', $params );
					}
					if ( $post_info_author == 'yes' ) {
						wanderers_mkdf_get_module_template_part( 'templates/parts/post-info/author', 'blog', '', $params );
					}
					if ( $post_info_comments == 'yes' ) {
						wanderers_mkdf_get_module_template_part( 'templates/parts/post-info/comments', 'blog', '', $params );
					}
					if ( $post_info_like == 'yes' ) {
						wanderers_mkdf_get_module_template_part( 'templates/parts/post-info/like', 'blog', '', $params );
					}
					if ( $post_info_share == 'yes' ) {
						wanderers_mkdf_get_module_template_part( 'templates/parts/post-info/share', 'blog', '', $params );
					}
					?>
				</div>
			<?php } ?>
        </div>
	</div>
</li>