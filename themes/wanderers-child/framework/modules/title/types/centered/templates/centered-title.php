<?php do_action('wanderers_mkdf_before_page_title'); ?>

<div class="mkdf-title-holder <?php echo esc_attr($holder_classes); ?>" <?php wanderers_mkdf_inline_style($holder_styles); ?> <?php echo wanderers_mkdf_get_inline_attrs($holder_data); ?>>
	<?php if (!empty($title_image)) { ?>
		<div class="mkdf-title-image">
			<img itemprop="image" src="<?php echo esc_url($title_image['src']); ?>" alt="<?php echo esc_attr($title_image['alt']); ?>" />
		</div>
	<?php } ?>
	<div class="mkdf-title-wrapper" <?php wanderers_mkdf_inline_style($wrapper_styles); ?>>
		<div class="mkdf-title-inner">
			<div class="mkdf-grid">
				<?php if (!empty(get_field('alternate_page_title'))) { ?>
					<<?php echo esc_attr($title_tag); ?> class="mkdf-page-title entry-title" <?php wanderers_mkdf_inline_style($title_styles); ?>><?php echo esc_html(get_field('alternate_page_title')); ?></<?php echo esc_attr($title_tag); ?>>
				<?php } elseif (!empty($title)) { ?>
					<<?php echo esc_attr($title_tag); ?> class="mkdf-page-title entry-title" <?php wanderers_mkdf_inline_style($title_styles); ?>><?php echo esc_html($title); ?></<?php echo esc_attr($title_tag); ?>>
				<?php } ?>
				
				<!-- <?php if (!empty($subtitle)) { ?>
					<<?php echo esc_attr($subtitle_tag); ?> class="mkdf-page-subtitle"><?php echo esc_html($subtitle); ?></<?php echo esc_attr($subtitle_tag); ?>>
				<?php } ?> -->
			</div>
		</div>
	</div>
</div>

<?php if (!empty(get_field('alternate_page_title'))) { ?>
<div class="mkdf-row-grid-section-wrapper ">
	<div class="mkdf-row-grid-section">
		<div class="vc_row wpb_row vc_row-fluid" style="padding-top: 6%;">
			<div class="wpb_column vc_column_container vc_col-sm-12">
				<div class="vc_column-inner">
					<div class="wpb_wrapper">
						<div class="mkdf-elements-holder mkdf-one-column mkdf-responsive-mode-768 ">
							<div class="mkdf-eh-item" data-item-class="mkdf-eh-custom-8456">
								<div class="mkdf-eh-item-inner">
									<div class="mkdf-eh-item-content mkdf-eh-custom-8456">
										<div class="mkdf-section-title-holder mkdf-st-standard mkdf-st-title-left mkdf-st-normal-space " style="padding: 0 18%; text-align: center;">
											<div class="mkdf-st-inner">
												<?php if (!empty(get_field('alternate_page_title'))) { ?>
													<<?php echo esc_attr($title_tag); ?> class="mkdf-page-title entry-title" <?php wanderers_mkdf_inline_style($title_styles); ?>>
														<?php echo esc_html(get_field('alternate_page_title')); ?>
													</<?php echo esc_attr($title_tag); ?>>
												<?php } ?>
	
												<?php if (!empty($subtitle)) { ?>
													<<?php echo esc_attr($subtitle_tag); ?> class="mkdf-st-text">
														<?php echo esc_html($subtitle); ?>
													</<?php echo esc_attr($subtitle_tag); ?>>
												<?php } ?>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php } ?>

<?php do_action('wanderers_mkdf_after_page_title'); ?>
