<?php

if ( ! function_exists( 'wanderers_mkdf_reset_options_map' ) ) {
	/**
	 * Reset options panel
	 */
	function wanderers_mkdf_reset_options_map() {
		
		wanderers_mkdf_add_admin_page(
			array(
				'slug'  => '_reset_page',
				'title' => esc_html__( 'Reset', 'wanderers' ),
				'icon'  => 'fa fa-retweet'
			)
		);
		
		$panel_reset = wanderers_mkdf_add_admin_panel(
			array(
				'page'  => '_reset_page',
				'name'  => 'panel_reset',
				'title' => esc_html__( 'Reset', 'wanderers' )
			)
		);
		
		wanderers_mkdf_add_admin_field(
			array(
				'type'          => 'yesno',
				'name'          => 'reset_to_defaults',
				'default_value' => 'no',
				'label'         => esc_html__( 'Reset to Defaults', 'wanderers' ),
				'description'   => esc_html__( 'This option will reset all Select Options values to defaults', 'wanderers' ),
				'parent'        => $panel_reset
			)
		);
	}
	
	add_action( 'wanderers_mkdf_options_map', 'wanderers_mkdf_reset_options_map', 100 );
}