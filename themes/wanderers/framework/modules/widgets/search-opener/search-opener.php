<?php
if ( class_exists( 'WanderersCoreClassWidget' ) ) {
	
	class WanderersMkdfSearchOpener extends WanderersCoreClassWidget {
		public function __construct() {
			parent::__construct(
				'mkdf_search_opener',
				esc_html__( 'Mikado Search Opener', 'wanderers' ),
				array( 'description' => esc_html__( 'Display a "search" icon that opens the search form', 'wanderers' ) )
			);
			
			$this->setParams();
		}
		
		protected function setParams() {
			$this->params = array(
				array(
					'type'        => 'textfield',
					'name'        => 'search_icon_size',
					'title'       => esc_html__( 'Icon Size (px)', 'wanderers' ),
					'description' => esc_html__( 'Define size for search icon', 'wanderers' )
				),
				array(
					'type'        => 'colorpicker',
					'name'        => 'search_icon_color',
					'title'       => esc_html__( 'Icon Color', 'wanderers' ),
					'description' => esc_html__( 'Define color for search icon', 'wanderers' )
				),
				array(
					'type'        => 'colorpicker',
					'name'        => 'search_icon_hover_color',
					'title'       => esc_html__( 'Icon Hover Color', 'wanderers' ),
					'description' => esc_html__( 'Define hover color for search icon', 'wanderers' )
				),
				array(
					'type'        => 'textfield',
					'name'        => 'search_icon_margin',
					'title'       => esc_html__( 'Icon Margin', 'wanderers' ),
					'description' => esc_html__( 'Insert margin in format: top right bottom left (e.g. 10px 5px 10px 5px)', 'wanderers' )
				),
				array(
					'type'        => 'dropdown',
					'name'        => 'show_label',
					'title'       => esc_html__( 'Enable Search Icon Text', 'wanderers' ),
					'description' => esc_html__( 'Enable this option to show search text next to search icon in header', 'wanderers' ),
					'options'     => wanderers_mkdf_get_yes_no_select_array()
				)
			);
		}
		
		public function widget( $args, $instance ) {
			global $wanderers_mkdf_options, $wanderers_mkdf_IconCollections;
			
			$search_type_class = 'mkdf-search-opener mkdf-icon-has-hover';
			$styles            = array();
			$show_search_text  = $instance['show_label'] == 'yes' || $wanderers_mkdf_options['enable_search_icon_text'] == 'yes' ? true : false;
			
			if ( ! empty( $instance['search_icon_size'] ) ) {
				$styles[] = 'font-size: ' . intval( $instance['search_icon_size'] ) . 'px';
			}
			
			if ( ! empty( $instance['search_icon_color'] ) ) {
				$styles[] = 'color: ' . $instance['search_icon_color'] . ';';
			}
			
			if ( ! empty( $instance['search_icon_margin'] ) ) {
				$styles[] = 'margin: ' . $instance['search_icon_margin'] . ';';
			}
			?>
			
			<a <?php wanderers_mkdf_inline_attr( $instance['search_icon_hover_color'], 'data-hover-color' ); ?> <?php wanderers_mkdf_inline_style( $styles ); ?> <?php wanderers_mkdf_class_attribute( $search_type_class ); ?>
					href="javascript:void(0)">
            <span class="mkdf-search-opener-wrapper">
                <?php if ( isset( $wanderers_mkdf_options['search_icon_pack'] ) ) {
	                $wanderers_mkdf_IconCollections->getSearchIcon( $wanderers_mkdf_options['search_icon_pack'], false );
                } ?>
	            <?php if ( $show_search_text ) { ?>
		            <span class="mkdf-search-icon-text"><?php esc_html_e( 'Search', 'wanderers' ); ?></span>
	            <?php } ?>
            </span>
			</a>
		<?php }
	}
}