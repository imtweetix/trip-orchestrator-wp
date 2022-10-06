<?php
$title = get_the_title();
?>

<div class="mkdf-info-section-part mkdf-tour-item-title-holder clearfix">
	<div class="mkdf-tour-item-title">
		<?php if ($title !== '') : ?>
			<h2>
				<?php echo esc_html($title) ?>
			</h2>
		<?php endif; ?>
		<?php if (!empty(get_field('alternate_page_title'))) : ?>
			<h4 class="mkdf-tour-item-subtitle">
				<?php echo esc_html(get_field('alternate_page_title')); ?>
			</h4>
		<?php endif; ?>
	</div>

	<div class="mkdf-tour-item-price-holder">
		<span class="mkdf-tour-item-price">
			<?php echo mkdf_tours_get_tour_price_html(get_the_ID()); ?>
		</span>
		<span class="mkdf-tour-item-price-text">
			<?php esc_html_e('per person', 'mkdf-tours'); ?>
		</span>
	</div>
</div>
