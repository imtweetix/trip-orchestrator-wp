<div <?php mkdf_tours_class_attribute($filter_class); ?>>
	<?php if($filter_type === 'vertical') : ?>
		<?php echo mkdf_tours_get_search_main_filters_html($show_tour_types, $number_of_tour_types); ?>
	<?php else: ?>
		<?php
			$tour_types = get_terms(array(
				'taxonomy' => 'tour-category'
			));
		?>

		<?php if($display_container_inner) : ?>
			<div class="mkdf-grid">
		<?php endif; ?>
		
		<div class="mkdf-tours-search-horizontal-filters-holder">
			<form action="<?php echo esc_url(mkdf_tours_get_search_page_url()); ?>" method="GET">
				<div class="mkdf-tours-filters-fields-holder">
					<div class="mkdf-tours-filter-field-holder mkdf-tours-filter-col">
						<div class="mkdf-tours-input-with-icon">
							<span class="mkdf-tours-input-icon">
								<span class="ion-ios-location"></span>
							</span>
							<input type="text" value="" class="mkdf-tours-destination-search" name="destination" placeholder="<?php esc_attr_e('Where to?', 'mkdf-tours'); ?>">
						</div>
					</div>
					
					<!--<div class="mkdf-tours-filter-field-holder mkdf-tours-filter-col">
						<div class="mkdf-tours-input-with-icon">
							<span class="mkdf-tours-input-icon">
								<span class="ion-calendar"></span>
							</span>
							<select class="mkdf-tours-select-placeholder" name="month">
								<option value=""><?php esc_html_e('When?', 'mkdf-tours'); ?></option>
								<option value="1"><?php esc_html_e('January', 'mkdf-tours'); ?></option>
								<option value="2"><?php esc_html_e('February', 'mkdf-tours'); ?></option>
								<option value="3"><?php esc_html_e('March', 'mkdf-tours'); ?></option>
								<option value="4"><?php esc_html_e('April', 'mkdf-tours'); ?></option>
								<option value="5"><?php esc_html_e('May', 'mkdf-tours'); ?></option>
								<option value="6"><?php esc_html_e('June', 'mkdf-tours'); ?></option>
								<option value="7"><?php esc_html_e('July', 'mkdf-tours'); ?></option>
								<option value="8"><?php esc_html_e('August', 'mkdf-tours'); ?></option>
								<option value="9"><?php esc_html_e('September', 'mkdf-tours'); ?></option>
								<option value="10"><?php esc_html_e('October', 'mkdf-tours'); ?></option>
								<option value="11"><?php esc_html_e('November', 'mkdf-tours'); ?></option>
								<option value="12"><?php esc_html_e('December', 'mkdf-tours'); ?></option>
							</select>
						</div>
					</div>
					
					<div class="mkdf-tours-filter-field-holder mkdf-tours-filter-col">
						<div class="mkdf-tours-input-with-icon">
							<span class="mkdf-tours-input-icon">
								<span class="ion-flag"></span>
							</span>
							<select class="mkdf-tours-select-placeholder" name="type[]">
								<option value=""><?php esc_html_e('Travel Type','mkdf-tours'); ?></option>
								<?php if(is_array($tour_types) && count($tour_types)) : ?>
									<?php foreach($tour_types as $tour_type) : ?>
										<option value="<?php echo esc_attr($tour_type->slug); ?>"><?php echo esc_html($tour_type->name); ?></option>
									<?php endforeach; ?>
								<?php endif; ?>
							</select>
						</div>
					</div>-->

					<div class="mkdf-tours-filter-field-holder mkdf-tours-filter-submit-field-holder mkdf-tours-filter-col">
						<?php if(mkdf_tours_theme_installed()) : ?>
							<?php echo mkdf_tours_execute_shortcode('mkdf_button', array(
								'html_type'  => 'input',
								'input_name' => 'mkdf_tours_search_submit',
								'text'       => esc_attr__('FIND NOW', 'mkdf-tours'),
								'custom_attrs' => array(
									'data-searching-label' => esc_attr__('Searching...', 'mkdf-tours')
								)
							)); ?>
						<?php else: ?>
							<input type="submit" data-searching-label="<?php esc_attr_e('Searching...', 'mkdf-tours'); ?>" name="mkdf_tours_search_submit" value="<?php esc_attr_e('FIND NOW', 'mkdf-tours') ?>">
						<?php endif; ?>
					</div>
					
					<?php if(mkdf_tours_is_wpml_installed()) { ?>
						<?php
							$lang = ICL_LANGUAGE_CODE;
						?>
						<input type="hidden" name="lang" value="<?php echo esc_attr($lang); ?>">
					<?php } ?>
				</div>
			</form>
		</div>

		<?php if($display_container_inner) : ?>
			</div>
		<?php endif; ?>

	<?php endif; ?>
</div>