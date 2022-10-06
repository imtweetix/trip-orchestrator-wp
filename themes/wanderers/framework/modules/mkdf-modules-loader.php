<?php

if ( ! function_exists( 'wanderers_mkdf_load_modules' ) ) {
	/**
	 * Loades all modules by going through all folders that are placed directly in modules folder
	 * and loads load.php file in each. Hooks to wanderers_mkdf_after_options_map action
	 *
	 * @see http://php.net/manual/en/function.glob.php
	 */
	function wanderers_mkdf_load_modules() {
		foreach ( glob( MIKADO_FRAMEWORK_ROOT_DIR . '/modules/*/load.php' ) as $module_load ) {
			include_once $module_load;
		}
	}
	
	add_action( 'wanderers_mkdf_before_options_map', 'wanderers_mkdf_load_modules' );
}
