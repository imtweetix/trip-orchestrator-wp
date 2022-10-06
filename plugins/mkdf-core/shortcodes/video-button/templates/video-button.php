<?php
$rand = rand(0, 1000);
$link_class = !empty($play_button_hover_image) ? 'mkdf-vb-has-hover-image' : '';
?>
<div class="mkdf-video-button-holder <?php echo esc_attr($holder_classes); ?>">
	<div class="mkdf-video-button-image">
		<?php echo wp_get_attachment_image($video_image, 'full'); ?>
	</div>
    <div class="mkdf-video-button-text-holder">
        <div class="mkdf-video-button-text-wrapper">
            <div class="mkdf-video-button-text-wrapper-inner">
                <div class="mkdf-vb-subtitle"> <?php echo esc_html($subtitle); ?> </div>
                <h3 class="mkdf-vb-title"> <?php echo esc_html($title); ?> </h3>
                <p class="mkdf-vb-excerpt"> <?php echo esc_html($excerpt); ?> </p>
                <?php if(!empty($play_button_image)) { ?>
                    <a class="mkdf-video-button-play-image <?php echo esc_attr($link_class); ?>" href="<?php echo esc_url($video_link); ?>" target="_self" data-rel="prettyPhoto[video_button_pretty_photo_<?php echo esc_attr($rand); ?>]">
			<span class="mkdf-video-button-play-inner">
				<?php echo wp_get_attachment_image($play_button_image, 'full'); ?>
                <?php if(!empty($play_button_hover_image)) { ?>
                    <?php echo wp_get_attachment_image($play_button_hover_image, 'full'); ?>
                <?php } ?>
			</span>
                    </a>
                <?php } else { ?>
                    <a class="mkdf-video-button-play" <?php echo wanderers_mkdf_get_inline_style($play_button_styles); ?> href="<?php echo esc_url($video_link); ?>" target="_self" data-rel="prettyPhoto[video_button_pretty_photo_<?php echo esc_attr($rand); ?>]">
			<span class="mkdf-video-button-play-inner">
				<span class="arrow_triangle-right_alt"></span>
			</span>
                    </a>
                <?php } ?>
            </div>
        </div>
    </div>
</div>