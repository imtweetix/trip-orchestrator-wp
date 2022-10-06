<form action="<?php echo esc_url( home_url( '/' ) ); ?>" class="mkdf-search-cover" method="get">
	<?php if ( $search_in_grid ) { ?>
	<div class="mkdf-container">
		<div class="mkdf-container-inner clearfix">
	<?php } ?>
			<div class="mkdf-form-holder-outer">
				<div class="mkdf-form-holder">
					<div class="mkdf-form-holder-inner">
						<span class="icon_search"></span>
						<input type="text" placeholder="<?php esc_attr_e( 'Search on site...', 'wanderers' ); ?>" name="s" class="mkdf_search_field" autocomplete="off" />
						<a class="mkdf-search-close" href="#">
							<?php echo wp_kses( $search_icon_close, array(
								'span' => array(
									'aria-hidden' => true,
									'class'       => true
								),
								'i'    => array(
									'class' => true
								)
							) ); ?>
						</a>
					</div>
				</div>
			</div>
	<?php if ( $search_in_grid ) { ?>
		</div>
	</div>
	<?php } ?>
</form>