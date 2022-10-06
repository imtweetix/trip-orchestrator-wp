<?php

/*** Child Theme Function  ***/
if (!function_exists('wanderers_mkdf_child_theme_enqueue_scripts')) {

	function wanderers_mkdf_child_theme_enqueue_scripts()
	{

		$parent_style = 'wanderers-mkdf-default-style';

		wp_enqueue_style('wanderers-mkdf-child-style', get_stylesheet_directory_uri() . '/style.css', array($parent_style));
	}

	add_action('wp_enqueue_scripts', 'wanderers_mkdf_child_theme_enqueue_scripts');
}

function custom_footer_scripts()
{ ?>

	<script>
		(function($) {
			const tourItemTabContainer = $(".mkdf-tab-container");
			const tourItemFooterButtons = $(".mkdf-tour-item-footer-buttons");
			const tourItemFooterButton = $(".mkdf-tour-item-footer-buttons li:first-child a");
			const tourNavTab = $(".mkdf-tabs-nav li a");

			if (tourItemFooterButtons.length) {
				tourItemFooterButton.click(function() {
					let tourItemFooterButtonLink = $(this).attr("href");
					tourItemTabContainer.hide();
					$("#" + tourItemFooterButtonLink).show();
					$(window).scrollTop(0);
					return false;
				})
			}

			// Set United States as a default country in the contact form.
			$('.wpcf7-select.country').val("United States");
		})(jQuery);
	</script>

<?php }

add_action('wp_footer', 'custom_footer_scripts');
