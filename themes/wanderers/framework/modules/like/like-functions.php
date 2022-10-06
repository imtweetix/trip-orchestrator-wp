<?php

if ( ! function_exists( 'wanderers_mkdf_like' ) ) {
	/**
	 * Returns WanderersMkdfLike instance
	 *
	 * @return WanderersMkdfLike
	 */
	function wanderers_mkdf_like() {
		return WanderersMkdfLike::get_instance();
	}
}

function wanderers_mkdf_get_like() {
	
	echo wp_kses( wanderers_mkdf_like()->add_like(), array(
		'span' => array(
			'class'       => true,
			'aria-hidden' => true,
			'style'       => true,
			'id'          => true
		),
		'i'    => array(
			'class' => true,
			'style' => true,
			'id'    => true
		),
		'a'    => array(
			'href'  => true,
			'class' => true,
			'id'    => true,
			'title' => true,
			'style' => true
		)
	) );
}