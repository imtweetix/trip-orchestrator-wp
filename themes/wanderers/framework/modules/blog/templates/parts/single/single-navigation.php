<?php
$blog_single_navigation = wanderers_mkdf_options()->getOptionValue('blog_single_navigation') === 'no' ? false : true;
$blog_navigation_through_same_category = wanderers_mkdf_options()->getOptionValue('blog_navigation_through_same_category') === 'no' ? false : true;
?>
<?php if($blog_single_navigation){ ?>
	<div class="mkdf-blog-single-navigation">
		<div class="mkdf-blog-single-navigation-inner clearfix">
			<?php
				/* Single navigation section - SETTING PARAMS */
				$previous_title = get_the_title(get_previous_post());
				$next_title = get_the_title(get_next_post());
			    $previous_title =   (strlen($previous_title) > 30)  ? substr($previous_title,0,30).'...'    : $previous_title;
			    $next_title =       (strlen($next_title) > 30)      ? substr($next_title,0,30).'...'        : $next_title;


				$post_navigation = array(
					'prev' => array(
						'mark' => '<span class="mkdf-blog-single-nav-mark arrow_carrot-left"></span>',
						'label' => '<h5 class="mkdf-blog-single-nav-label">'. $previous_title. '</h5>'
					),
					'next' => array(
						'mark' => '<span class="mkdf-blog-single-nav-mark arrow_carrot-right"></span>',
						'label' => '<h5 class="mkdf-blog-single-nav-label">'. $next_title .'</h5>'
					)
				);
			
				if($blog_navigation_through_same_category){
					if(get_previous_post(true) !== ""){
						$post_navigation['prev']['post'] = get_previous_post(true);
					}
					if(get_next_post(true) !== ""){
						$post_navigation['next']['post'] = get_next_post(true);
					}
				} else {
					if(get_previous_post() !== ""){
						$post_navigation['prev']['post'] = get_previous_post();
					}
					if(get_next_post() !== ""){
						$post_navigation['next']['post'] = get_next_post();
					}
				}

				/* Single navigation section - RENDERING */
				foreach (array('prev', 'next') as $nav_type) {
					if (isset($post_navigation[$nav_type]['post'])) { ?>
						<a itemprop="url" class="mkdf-blog-single-<?php echo esc_attr($nav_type); ?>" href="<?php echo get_permalink($post_navigation[$nav_type]['post']->ID); ?>">
							<?php echo wp_kses($post_navigation[$nav_type]['mark'], array('span' => array('class' => true))); ?>
							<?php echo wp_kses($post_navigation[$nav_type]['label'], array('h5' => array('class' => true))); ?>
						</a>
					<?php }
				}
			?>
		</div>
	</div>
<?php } ?>