<?php if(comments_open()) { ?>
	<div class="mkdf-post-info-comments-holder">
		<a itemprop="url" class="mkdf-post-info-comments" href="<?php comments_link(); ?>" target="_self">
			<?php echo wanderers_mkdf_icon_collections()->renderIcon('icon_chat', 'font_elegant'); ?>
			<?php comments_number('0', '1', '%'); ?>
		</a>
	</div>
<?php } ?>