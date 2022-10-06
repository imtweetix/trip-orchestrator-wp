<?php

if ( ! function_exists( 'wanderers_mkdf_register_blog_standard_template_file' ) ) {
	/**
	 * Function that register blog standard template
	 */
	function wanderers_mkdf_register_blog_standard_template_file( $templates ) {
		$templates['blog-standard'] = esc_html__( 'Blog: Standard', 'wanderers' );
		
		return $templates;
	}
	
	add_filter( 'wanderers_mkdf_register_blog_templates', 'wanderers_mkdf_register_blog_standard_template_file' );
}

if ( ! function_exists( 'wanderers_mkdf_set_blog_standard_type_global_option' ) ) {
	/**
	 * Function that set blog list type value for global blog option map
	 */
	function wanderers_mkdf_set_blog_standard_type_global_option( $options ) {
		$options['standard'] = esc_html__( 'Blog: Standard', 'wanderers' );
		
		return $options;
	}
	
	add_filter( 'wanderers_mkdf_blog_list_type_global_option', 'wanderers_mkdf_set_blog_standard_type_global_option' );
}