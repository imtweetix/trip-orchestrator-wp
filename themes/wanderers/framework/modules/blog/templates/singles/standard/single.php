<?php

wanderers_mkdf_get_single_post_format_html($blog_single_type);

do_action('wanderers_mkdf_after_article_content');

wanderers_mkdf_get_module_template_part('templates/parts/single/author-info', 'blog');

wanderers_mkdf_get_module_template_part('templates/parts/single/single-navigation', 'blog');

wanderers_mkdf_get_module_template_part('templates/parts/single/related-posts', 'blog', '', $single_info_params);

wanderers_mkdf_get_module_template_part('templates/parts/single/comments', 'blog');