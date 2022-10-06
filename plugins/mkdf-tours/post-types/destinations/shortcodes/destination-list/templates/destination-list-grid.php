<div class="mkdf-tours-destination-list">
	<?php if($query->have_posts()) : ?>
		<div <?php mkdf_tours_class_attribute($classes);?>>
	        <div class="mkdf-tours-row-inner-holder mkdf-outer-space">
				<?php while($query->have_posts()) : ?>
					<?php $query->the_post(); ?>

                    <?php
                    $id = get_the_ID();
                    $custom_label = get_post_meta($id, 'mkdf_destionations_custom_label', true);
                    ?>

					<?php if(has_post_thumbnail()) : ?>
						<div <?php post_class('mkdf-tours-destination-list-item mkdf-tours-row-item mkdf-item-space'); ?>>
							<div class="mkdf-tours-destination-item-holder">
								<a href="<?php the_permalink() ?>">
									<div class="mkdf-tours-destination-item-image">
										<?php the_post_thumbnail($thumb_size); ?>
									</div>

									<div class="mkdf-tours-destination-item-content">
										<div class="mkdf-tours-destination-item-content-inner">
                                            <div class="mkdf-tours-destination-item-text">
                                                <?php if(!empty($custom_label)) { ?>
                                                    <div class="mkdf-tours-destination-custom-label">
                                                        <?php echo esc_html($custom_label); ?>
                                                    </div>
                                                <?php } ?>
                                                <<?php echo esc_attr($title_tag);?> class="mkdf-tours-destination-item-title"><?php the_title(); ?></<?php echo esc_attr($title_tag);?>>
                                            </div>
										</div>
									</div>
								</a>
							</div>
						</div>
					<?php endif; ?>
				<?php endwhile; ?>
			</div>
		</div>

		<?php wp_reset_postdata(); ?>

	<?php else: ?>
		<p><?php esc_html_e('No destinations matched your criteria.', 'mkdf-tours'); ?></p>
	<?php endif; ?>
</div>