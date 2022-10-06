<?php

class WanderersMkdfFieldPortfolioFollow extends WanderersMkdfFieldType {

	public function render( $name, $label="", $description="", $options = array(), $args = array() ) { ?>

		<div class="mkdf-page-form-section" id="mkdf_<?php echo esc_attr($name); ?>">
			<div class="mkdf-field-desc">
				<h4><?php echo esc_html($label); ?></h4>
				<p><?php echo esc_html($description); ?></p>
			</div>
			<div class="mkdf-section-content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-12">
							<p class="field switch">
								<label class="cb-enable<?php if (wanderers_mkdf_option_get_value($name) == "portfolio_single_follow") { echo " selected"; } ?>"><span><?php esc_html_e('Yes', 'wanderers') ?></span></label>
								<label class="cb-disable<?php if (wanderers_mkdf_option_get_value($name) == "portfolio_single_no_follow") { echo " selected"; } ?>"><span><?php esc_html_e('No', 'wanderers') ?></span></label>
								<input type="checkbox" id="checkbox" class="checkbox"
									   name="<?php echo esc_attr($name); ?>_portfoliofollow" value="portfolio_single_follow"<?php if (wanderers_mkdf_option_get_value($name) == "portfolio_single_follow") { echo " selected"; } ?>/>
								<input type="hidden" class="checkboxhidden_portfoliofollow" name="<?php echo esc_attr($name); ?>" value="<?php echo esc_attr(wanderers_mkdf_option_get_value($name)); ?>"/>
							</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	<?php
	}
}

class WanderersMkdfFieldZeroOne extends WanderersMkdfFieldType {

	public function render( $name, $label="", $description="", $options = array(), $args = array()) { ?>

		<div class="mkdf-page-form-section" id="mkdf_<?php echo esc_attr($name); ?>">
			<div class="mkdf-field-desc">
				<h4><?php echo esc_html($label); ?></h4>
				<p><?php echo esc_html($description); ?></p>
			</div>
			<div class="mkdf-section-content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-12">
							<p class="field switch">
								<label class="cb-enable<?php if (wanderers_mkdf_option_get_value($name) == "1") { echo " selected"; } ?>"><span><?php esc_html_e('Yes', 'wanderers') ?></span></label>
								<label class="cb-disable<?php if (wanderers_mkdf_option_get_value($name) == "0") { echo " selected"; } ?>"><span><?php esc_html_e('No', 'wanderers') ?></span></label>
								<input type="checkbox" id="checkbox" class="checkbox"
									   name="<?php echo esc_attr($name); ?>_zeroone" value="1"<?php if (wanderers_mkdf_option_get_value($name) == "1") { echo " selected"; } ?>/>
								<input type="hidden" class="checkboxhidden_zeroone" name="<?php echo esc_attr($name); ?>" value="<?php echo esc_attr(wanderers_mkdf_option_get_value($name)); ?>"/>
							</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	<?php
	}
}

class WanderersMkdfFieldImageVideo extends WanderersMkdfFieldType {

	public function render( $name, $label="", $description="", $options = array(), $args = array()) { ?>
		
		<div class="mkdf-page-form-section" id="mkdf_<?php echo esc_attr($name); ?>">
			<div class="mkdf-field-desc">
				<h4><?php echo esc_html($label); ?></h4>
				<p><?php echo esc_html($description); ?></p>
			</div>
			<div class="mkdf-section-content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-12">
							<p class="field switch switch-type">
								<label class="cb-enable<?php if (wanderers_mkdf_option_get_value($name) == "image") { echo " selected"; } ?>"><span><?php esc_html_e('Image', 'wanderers') ?></span></label>
								<label class="cb-disable<?php if (wanderers_mkdf_option_get_value($name) == "video") { echo " selected"; } ?>"><span><?php esc_html_e('Video', 'wanderers') ?></span></label>
								<input type="checkbox" id="checkbox" class="checkbox"
									   name="<?php echo esc_attr($name); ?>_imagevideo" value="image"<?php if (wanderers_mkdf_option_get_value($name) == "image") { echo " selected"; } ?>/>
								<input type="hidden" class="checkboxhidden_imagevideo" name="<?php echo esc_attr($name); ?>" value="<?php echo esc_attr(wanderers_mkdf_option_get_value($name)); ?>"/>
							</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	<?php
	}
}

class WanderersMkdfFieldYesEmpty extends WanderersMkdfFieldType {

	public function render( $name, $label="", $description="", $options = array(), $args = array() ) { ?>

		<div class="mkdf-page-form-section" id="mkdf_<?php echo esc_attr($name); ?>">
			<div class="mkdf-field-desc">
				<h4><?php echo esc_html($label); ?></h4>
				<p><?php echo esc_html($description); ?></p>
			</div>
			<div class="mkdf-section-content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-12">
							<p class="field switch">
								<label class="cb-enable<?php if (wanderers_mkdf_option_get_value($name) == "yes") { echo " selected"; } ?>"><span><?php esc_html_e('Yes', 'wanderers') ?></span></label>
								<label class="cb-disable<?php if (wanderers_mkdf_option_get_value($name) == "") { echo " selected"; } ?>"><span><?php esc_html_e('No', 'wanderers') ?></span></label>
								<input type="checkbox" id="checkbox" class="checkbox"
									   name="<?php echo esc_attr($name); ?>_yesempty" value="yes"<?php if (wanderers_mkdf_option_get_value($name) == "yes") { echo " selected"; } ?>/>
								<input type="hidden" class="checkboxhidden_yesempty" name="<?php echo esc_attr($name); ?>" value="<?php echo esc_attr(wanderers_mkdf_option_get_value($name)); ?>"/>
							</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	<?php
	}
}

class WanderersMkdfFieldFlagPage extends WanderersMkdfFieldType {

	public function render( $name, $label="", $description="", $options = array(), $args = array()) { ?>

		<div class="mkdf-page-form-section" id="mkdf_<?php echo esc_attr($name); ?>">
			<div class="mkdf-field-desc">
				<h4><?php echo esc_html($label); ?></h4>
				<p><?php echo esc_html($description); ?></p>
			</div>
			<div class="mkdf-section-content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-12">
							<p class="field switch">
								<label class="cb-enable<?php if (wanderers_mkdf_option_get_value($name) == "page") { echo " selected"; } ?>"><span><?php esc_html_e('Yes', 'wanderers') ?></span></label>
								<label class="cb-disable<?php if (wanderers_mkdf_option_get_value($name) == "") { echo " selected"; } ?>"><span><?php esc_html_e('No', 'wanderers') ?></span></label>
								<input type="checkbox" id="checkbox" class="checkbox"
									   name="<?php echo esc_attr($name); ?>_flagpage" value="page"<?php if (wanderers_mkdf_option_get_value($name) == "page") { echo " selected"; } ?>/>
								<input type="hidden" class="checkboxhidden_flagpage" name="<?php echo esc_attr($name); ?>" value="<?php echo esc_attr(wanderers_mkdf_option_get_value($name)); ?>"/>
							</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	<?php
	}
}

class WanderersMkdfFieldFlagPost extends WanderersMkdfFieldType {

	public function render( $name, $label="", $description="", $options = array(), $args = array() ) { ?>

		<div class="mkdf-page-form-section" id="mkdf_<?php echo esc_attr($name); ?>">
			<div class="mkdf-field-desc">
				<h4><?php echo esc_html($label); ?></h4>
				<p><?php echo esc_html($description); ?></p>
			</div>
			<div class="mkdf-section-content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-12">
							<p class="field switch">
								<label class="cb-enable<?php if (wanderers_mkdf_option_get_value($name) == "post") { echo " selected"; } ?>"><span><?php esc_html_e('Yes', 'wanderers') ?></span></label>
								<label class="cb-disable<?php if (wanderers_mkdf_option_get_value($name) == "") { echo " selected"; } ?>"><span><?php esc_html_e('No', 'wanderers') ?></span></label>
								<input type="checkbox" id="checkbox" class="checkbox"
									   name="<?php echo esc_attr($name); ?>_flagpost" value="post"<?php if (wanderers_mkdf_option_get_value($name) == "post") { echo " selected"; } ?>/>
								<input type="hidden" class="checkboxhidden_flagpost" name="<?php echo esc_attr($name); ?>" value="<?php echo esc_attr(wanderers_mkdf_option_get_value($name)); ?>"/>
							</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	<?php
	}
}

class WanderersMkdfFieldFlagMedia extends WanderersMkdfFieldType {

	public function render( $name, $label="", $description="", $options = array(), $args = array()) { ?>

		<div class="mkdf-page-form-section" id="mkdf_<?php echo esc_attr($name); ?>">
			<div class="mkdf-field-desc">
				<h4><?php echo esc_html($label); ?></h4>
				<p><?php echo esc_html($description); ?></p>
			</div>
			<div class="mkdf-section-content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-12">
							<p class="field switch">
								<label class="cb-enable<?php if (wanderers_mkdf_option_get_value($name) == "attachment") { echo " selected"; } ?>"><span><?php esc_html_e('Yes', 'wanderers') ?></span></label>
								<label class="cb-disable<?php if (wanderers_mkdf_option_get_value($name) == "") { echo " selected"; } ?>"><span><?php esc_html_e('No', 'wanderers') ?></span></label>
								<input type="checkbox" id="checkbox" class="checkbox"
									   name="<?php echo esc_attr($name); ?>_flagmedia" value="attachment"<?php if (wanderers_mkdf_option_get_value($name) == "attachment") { echo " selected"; } ?>/>
								<input type="hidden" class="checkboxhidden_flagmedia" name="<?php echo esc_attr($name); ?>" value="<?php echo esc_attr(wanderers_mkdf_option_get_value($name)); ?>"/>
							</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	<?php
	}
}

class WanderersMkdfFieldFlagPortfolio extends WanderersMkdfFieldType {

	public function render( $name, $label="", $description="", $options = array(), $args = array()) { ?>
		<div class="mkdf-page-form-section" id="mkdf_<?php echo esc_attr($name); ?>">
			<div class="mkdf-field-desc">
				<h4><?php echo esc_html($label); ?></h4>
				<p><?php echo esc_html($description); ?></p>
			</div>
			<div class="mkdf-section-content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-12">
							<p class="field switch">
								<label class="cb-enable<?php if (wanderers_mkdf_option_get_value($name) == "portfolio_page") { echo " selected"; } ?>"><span><?php esc_html_e('Yes', 'wanderers') ?></span></label>
								<label class="cb-disable<?php if (wanderers_mkdf_option_get_value($name) == "") { echo " selected"; } ?>"><span><?php esc_html_e('No', 'wanderers') ?></span></label>
								<input type="checkbox" id="checkbox" class="checkbox"
									   name="<?php echo esc_attr($name); ?>_flagportfolio" value="portfolio_page"<?php if (wanderers_mkdf_option_get_value($name) == "portfolio_page") { echo " selected"; } ?>/>
								<input type="hidden" class="checkboxhidden_flagportfolio" name="<?php echo esc_attr($name); ?>" value="<?php echo esc_attr(wanderers_mkdf_option_get_value($name)); ?>"/>
							</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	<?php
	}
}

class WanderersMkdfFieldFlagProduct extends WanderersMkdfFieldType {

	public function render( $name, $label="", $description="", $options = array(), $args = array()) { ?>

		<div class="mkdf-page-form-section" id="mkdf_<?php echo esc_attr($name); ?>">
			<div class="mkdf-field-desc">
				<h4><?php echo esc_html($label); ?></h4>
				<p><?php echo esc_html($description); ?></p>
			</div>
			<div class="mkdf-section-content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-12">
							<p class="field switch">
								<label class="cb-enable<?php if (wanderers_mkdf_option_get_value($name) == "product") { echo " selected"; } ?>"><span><?php esc_html_e('Yes', 'wanderers') ?></span></label>
								<label class="cb-disable<?php if (wanderers_mkdf_option_get_value($name) == "") { echo " selected"; } ?>"><span><?php esc_html_e('No', 'wanderers') ?></span></label>
								<input type="checkbox" id="checkbox" class="checkbox"
									   name="<?php echo esc_attr($name); ?>_flagproduct" value="product"<?php if (wanderers_mkdf_option_get_value($name) == "product") { echo " selected"; } ?>/>
								<input type="hidden" class="checkboxhidden_flagproduct" name="<?php echo esc_attr($name); ?>" value="<?php echo esc_attr(wanderers_mkdf_option_get_value($name)); ?>"/>
							</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	<?php
	}
}

class WanderersMkdfFieldRange extends WanderersMkdfFieldType {

	public function render( $name, $label="", $description="", $options = array(), $args = array()) {
		$range_min = 0;
		$range_max = 1;
		$range_step = 0.01;
		$range_decimals = 2;
		if(isset($args["range_min"])) {
			$range_min = $args["range_min"];
		}
		
		if(isset($args["range_max"])) {
			$range_max = $args["range_max"];
		}
		
		if(isset($args["range_step"])) {
			$range_step = $args["range_step"];
		}
		
		if(isset($args["range_decimals"])) {
			$range_decimals = $args["range_decimals"];
		}
		?>

		<div class="mkdf-page-form-section">
			<div class="mkdf-field-desc">
				<h4><?php echo esc_html($label); ?></h4>
				<p><?php echo esc_html($description); ?></p>
			</div>
			<div class="mkdf-section-content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-12">
							<div class="mkdf-slider-range-wrapper">
								<div class="form-inline">
									<input type="text" class="form-control mkdf-form-element mkdf-form-element-xsmall pull-left mkdf-slider-range-value" name="<?php echo esc_attr($name); ?>" value="<?php echo esc_attr(wanderers_mkdf_option_get_value($name)); ?>"/>
									<div class="mkdf-slider-range small" data-step="<?php echo esc_attr($range_step); ?>" data-min="<?php echo esc_attr($range_min); ?>" data-max="<?php echo esc_attr($range_max); ?>" data-decimals="<?php echo esc_attr($range_decimals); ?>" data-start="<?php echo esc_attr(wanderers_mkdf_option_get_value($name)); ?>"></div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	<?php
	}
}

class WanderersMkdfFieldRangeSimple extends WanderersMkdfFieldType {

	public function render( $name, $label="", $description="", $options = array(), $args = array()) {	?>

		<div class="col-lg-3" id="mkdf_<?php echo esc_attr($name); ?>">
			<div class="mkdf-slider-range-wrapper">
				<div class="form-inline">
					<em class="mkdf-field-description"><?php echo esc_html($label); ?></em>
					<input type="text" class="form-control mkdf-form-element mkdf-form-element-xxsmall pull-left mkdf-slider-range-value" name="<?php echo esc_attr($name); ?>" value="<?php echo esc_attr(wanderers_mkdf_option_get_value($name)); ?>"/>
					<div class="mkdf-slider-range xsmall" data-step="0.01" data-max="1" data-start="<?php echo esc_attr(wanderers_mkdf_option_get_value($name)); ?>"></div>
				</div>
			</div>
		</div>
	<?php
	}
}

class WanderersMkdfFieldRadio extends WanderersMkdfFieldType {

	public function render( $name, $label="", $description="", $options = array(), $args = array()) {

        $checked = $value = "";
        $value_saved = wanderers_mkdf_option_has_value($name);
        if($value_saved) {
            $value = wanderers_mkdf_option_get_value($name);
            $checked = $value == 'yes' ? "checked" : "";
        }
		
		$html = '<input type="radio" name="'.$name.'" value="'.$value.'" '.$checked.' /> '.$label.'<br />';
		echo wp_kses($html, array(
			'input' => array(
				'type' => true,
				'name' => true,
				'value' => true,
				'checked' => true
			),
			'br' => true
		));
	}
}

class WanderersMkdfFieldRadioGroup extends WanderersMkdfFieldType {

    public function render( $name, $label="", $description="", $options = array(), $args = array()) {

        $use_images = isset($args["use_images"]) && $args["use_images"] ? true : false;
        $hide_labels = isset($args["hide_labels"]) && $args["hide_labels"] ? true : false;
        $hide_radios = $use_images ? 'display: none' : '';
        $checked_value = wanderers_mkdf_option_get_value($name);
        ?>

        <div class="mkdf-page-form-section" id="mkdf_<?php echo esc_attr($name); ?>">
            <div class="mkdf-field-desc">
                <h4><?php echo esc_html($label); ?></h4>
                <p><?php echo esc_html($description); ?></p>
            </div>
            <div class="mkdf-section-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <?php if(is_array($options) && count($options)) { ?>
                                <div class="mkdf-field mkdf-radio-group-holder <?php if($use_images) echo "with-images"; ?>" data-option-name="<?php echo esc_attr( $name ); ?>" data-option-type="radiogroup">
                                    <?php foreach($options as $key => $atts) {
                                        $selected = false;
                                        if($checked_value == $key) {
                                            $selected = true;
                                        }
                                    ?>
                                        <label class="radio-inline">
                                            <input <?php if($selected) echo "checked"; ?> <?php wanderers_mkdf_inline_style($hide_radios); ?>
                                                type="radio" name="<?php echo esc_attr($name);  ?>" value="<?php echo esc_attr($key); ?>">
                                                <?php if(!empty($atts["label"]) && !$hide_labels) echo esc_attr($atts["label"]); ?>

                                            <?php if($use_images) { ?>
                                                <img title="<?php if(!empty($atts["label"])) echo esc_attr($atts["label"]); ?>" src="<?php echo esc_url($atts['image']); ?>" alt="<?php echo esc_attr("$key image") ?>"/>
                                            <?php } ?>
                                        </label>
                                    <?php } ?>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php
    }
}

class WanderersMkdfFieldCheckBoxGroup extends WanderersMkdfFieldType {

    public function render($name, $label = '', $description = '', $options = array(), $args = array(), $repeat = array()) {
        if(!(is_array($options) && count($options))) {
            return;
        }

		if (!empty($repeat) && array_key_exists('name', $repeat) && array_key_exists('index', $repeat)) {
			$id		= $name . '-' . $repeat['index'];
			$name	= $repeat['name'] . '['.$repeat['index'].']['. $name .']';
			$saved_value	= $repeat['value'];
		} else {
			$id = $name;
			$saved_value = wanderers_mkdf_option_get_value($name);
		}

        $show = !empty($args["show"]) ? $args["show"] : array();

        ?>

        <div class="mkdf-page-form-section" id="mkdf_<?php echo esc_attr($id); ?>">
            <div class="mkdf-field-desc">
                <h4><?php echo esc_html($label); ?></h4>
                <p><?php echo esc_html($description); ?></p>
            </div>
            <div class="mkdf-section-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="mkdf-checkbox-group-holder">
                            	<!-- Needed for font weight and fonts group of option in order to save empty value -->
                                <div class="checkbox-inline" style="display: none">
                                    <label>
                                        <input checked type="checkbox" value="" name="<?php echo esc_attr($name.'[]'); ?>">
                                    </label>
                                </div>
                                <?php foreach($options as $option_key => $option_label) : ?>
                                    <?php
                                    if($option_label !== ''){
                                        $i = 1;
                                        $checked = is_array($saved_value) && in_array($option_key, $saved_value);
                                        $checked_attr = $checked ? 'checked' : '';

                                        ?>
                                        <div class="checkbox-inline">
                                            <label>
                                                <input <?php echo esc_attr($checked_attr); ?> type="checkbox"
                                                                                           id="<?php echo esc_attr($name.$option_key).'-'.$i; ?>"
                                                                                           value="<?php echo esc_attr($option_key); ?>" name="<?php echo esc_attr($name.'[]'); ?>"
                                                <label for="<?php echo esc_attr($name.$option_key).'-'.$i; ?>"><?php echo esc_html($option_label); ?></label>
                                            </label>
                                        </div>
                                        <?php
                                        $i++;
                                    }
                                endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
    }
}

class WanderersMkdfFieldCheckBox extends WanderersMkdfFieldType {

	public function render( $name, $label="", $description="", $options = array(), $args = array() ) {

        $checked = "";

        if ('1' === wanderers_mkdf_option_get_value($name)){
            $checked = "checked";
        }

        $html = '<div class ="mkdf-page-form-section">';
        $html .= '<div class="mkdf-section-content">';
        $html .= '<div class="container-fluid">';
        $html .= '<div class="row">';
        $html .= '<div class="col-lg-3">';
        $html .= '<input id="' . $name . '" class="mkdf-single-checkbox-field" type="checkbox" name="' . $name . '" value="1" ' . $checked . ' />';
        $html .= '<label for="' . $name . '"> ' . $label . '</label><br />';
        $html .= '<input class="mkdf-checkbox-single-hidden" type="hidden" name="' . $name . '" value="0"/>';
        $html .= '</div>'; //close col-lg-3
        $html .= '</div>'; //close row
        $html .= '</div>'; //close container-fluid
        $html .= '</div>'; //close mkdf-section-content
        $html .= '</div>'; //close mkdf-page-form-section

        echo wp_kses($html, array(
            'input' => array(
                'type' => true,
                'id'    => true,
                'name' => true,
                'value' => true,
                'checked' => true,
                'class'   => true,
                'disabled' => true
            ),
            'div' => array(
                'class' => true
            ),
            'br' => true,
            'label' => array(
                'for'=>true
            )
        ));
	}
}

class WanderersMkdfFieldDate extends WanderersMkdfFieldType {

	public function render( $name, $label="", $description="", $options = array(), $args = array(), $repeat = array() ) {
		$col_width = 2;
		if(isset($args["col_width"]))
			$col_width = $args["col_width"];

		$suffix = !empty($args['suffix']) ? $args['suffix'] : false;

		$class = '';
		$data_string = '';
		if (!empty($repeat) && array_key_exists('name', $repeat) && array_key_exists('index', $repeat)) {
			$id		= $name . '-' . $repeat['index'];
			$name	= $repeat['name'] . '['.$repeat['index'].']['. $name .']';
			$value	= $repeat['value'];
		} else {
			$id = $name;
			$value = wanderers_mkdf_option_get_value($name);
		}

		if($label === '' && $description === '') {
			$class .= ' mkdf-no-description';
		}

		if(isset($args['custom_class']) && $args['custom_class'] != '') {
			$class .= ' '  . $args['custom_class'];
		}

		if(isset($args['input-data']) && $args['input-data'] != '') {
			foreach($args['input-data'] as $data_key => $data_value) {
				$data_string .= $data_key . '=' . $data_value;
				$data_string .= ' ';
			}
		}
		?>

		<div class="mkdf-page-form-section <?php echo esc_attr($class); ?>" id="mkdf_<?php echo esc_attr($id); ?>">
			<div class="mkdf-field-desc">
				<h4><?php echo esc_html($label); ?></h4>
				<p><?php echo esc_html($description); ?></p>
			</div>
			<div class="mkdf-section-content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-<?php echo esc_attr($col_width); ?>">
                            <?php if($suffix) : ?>
                            <div class="input-group">
                            <?php endif; ?>
							<input type="text" id="mkdf_<?php echo esc_attr($id);?>dp" class="datepicker form-control mkdf-input mkdf-form-element" name="<?php echo esc_attr($name); ?>" value="<?php echo esc_attr($value); ?>" />
	                            <?php if($suffix) : ?>
                                    <div class="input-group-addon"><?php echo esc_html($args['suffix']); ?></div>
	                            <?php endif; ?>
	                            <?php if($suffix) : ?>
                            </div>
						<?php endif; ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	<?php
	}
}

class WanderersMkdfFieldFile extends WanderersMkdfFieldType {

    public function render( $name, $label="", $description="", $options = array(), $args = array()) {
        $value = wanderers_mkdf_option_get_value($name);
        $has_value = wanderers_mkdf_option_has_value($name);
        ?>

        <div class="mkdf-page-form-section">


            <div class="mkdf-field-desc">
                <h4><?php echo esc_html($label); ?></h4>

                <p><?php echo esc_html($description); ?></p>
            </div>
            <!-- close div.mkdf-field-desc -->

            <div class="mkdf-section-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="mkdf-media-uploader">
                                <div<?php if (!$has_value) { ?> style="display: none"<?php } ?>
                                    class="mkdf-media-image-holder">
                                    <img src="<?php if ($has_value) { echo esc_url(wanderers_mkdf_option_get_uploaded_file_icon($value)); } ?>" alt="<?php esc_attr_e( 'Image thumbnail', 'wanderers' ); ?>"
                                         class="mkdf-media-image img-thumbnail"/>
                                    <?php if ($has_value) { ?> <h4 class="mkdf-media-title"><?php echo wanderers_mkdf_option_get_uploaded_file_title($value) ?></h4> <?php } ?>
                                </div>
                                <div style="display: none"
                                     class="mkdf-media-meta-fields">
                                    <input type="hidden" class="mkdf-media-upload-url"
                                           name="<?php echo esc_attr($name); ?>"
                                           value="<?php echo esc_attr($value); ?>"/>
                                </div>
                                <a class="mkdf-media-upload-btn btn btn-sm btn-primary"
                                   href="javascript:void(0)"
                                   data-frame-title="<?php esc_attr_e('Select File', 'wanderers'); ?>"
                                   data-frame-button-text="<?php esc_attr_e('Select File', 'wanderers'); ?>"><?php esc_html_e('Upload', 'wanderers'); ?></a>
                                <a style="display: none;" href="javascript: void(0)"
                                   class="mkdf-media-remove-btn btn btn-default btn-sm"><?php esc_html_e('Remove', 'wanderers'); ?></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- close div.mkdf-section-content -->

        </div>
        <?php

    }

}

class WanderersMkdfFieldFactory {

	public function render( $field_type, $name, $label="", $description="", $options = array(), $args = array(), $repeat = array() ) {
		
		switch ( strtolower( $field_type ) ) {

			case 'text':
				$field = new WanderersMkdfFieldText();
				$field->render( $name, $label, $description, $options, $args, $repeat );
				break;
			case 'textsimple':
				$field = new WanderersMkdfFieldTextSimple();
				$field->render( $name, $label, $description, $options, $args );
				break;
			case 'textarea':
				$field = new WanderersMkdfFieldTextArea();
				$field->render( $name, $label, $description, $options, $args, $repeat );
				break;
			case 'textareasimple':
				$field = new WanderersMkdfFieldTextAreaSimple();
				$field->render( $name, $label, $description, $options, $args );
				break;
			case 'textareahtml':
				$field = new WanderersMkdfFieldTextAreaHtml();
				$field->render( $name, $label, $description, $options, $args, $repeat );
				break;
			case 'color':
				$field = new WanderersMkdfFieldColor();
				$field->render( $name, $label, $description, $options, $args, $repeat );
				break;
			case 'colorsimple':
				$field = new WanderersMkdfFieldColorSimple();
				$field->render( $name, $label, $description, $options, $args );
				break;
			case 'image':
				$field = new WanderersMkdfFieldImage();
				$field->render( $name, $label, $description, $options, $args, $repeat );
				break;
            case 'imagesimple':
				$field = new WanderersMkdfFieldImageSimple();
				$field->render( $name, $label, $description, $options, $args );
				break;
			case 'font':
				$field = new WanderersMkdfFieldFont();
				$field->render( $name, $label, $description, $options, $args, $repeat );
				break;
			case 'fontsimple':
				$field = new WanderersMkdfFieldFontSimple();
				$field->render( $name, $label, $description, $options, $args );
				break;
			case 'select':
				$field = new WanderersMkdfFieldSelect();
				$field->render( $name, $label, $description, $options, $args, $repeat );
				break;
			case 'selectblank':
				$field = new WanderersMkdfFieldSelectBlank();
				$field->render( $name, $label, $description, $options, $args, $repeat );
				break;
			case 'selectsimple':
				$field = new WanderersMkdfFieldSelectSimple();
				$field->render( $name, $label, $description, $options, $args );
				break;
			case 'selectblanksimple':
				$field = new WanderersMkdfFieldSelectBlankSimple();
				$field->render( $name, $label, $description, $options, $args );
				break;
			case 'yesno':
				$field = new WanderersMkdfFieldYesNo();
				$field->render( $name, $label, $description, $options, $args, $repeat );
				break;
			case 'yesnosimple':
				$field = new WanderersMkdfFieldYesNoSimple();
				$field->render( $name, $label, $description, $options, $args );
				break;
			case 'portfoliofollow':
				$field = new WanderersMkdfFieldPortfolioFollow();
				$field->render( $name, $label, $description, $options, $args );
				break;
			case 'zeroone':
				$field = new WanderersMkdfFieldZeroOne();
				$field->render( $name, $label, $description, $options, $args );
				break;
			case 'imagevideo':
				$field = new WanderersMkdfFieldImageVideo();
				$field->render( $name, $label, $description, $options, $args );
				break;
			case 'yesempty':
				$field = new WanderersMkdfFieldYesEmpty();
				$field->render( $name, $label, $description, $options, $args );
				break;
            case 'file':
                $field = new WanderersMkdfFieldFile();
                $field->render($name, $label, $description, $options, $args);
                break;
			case 'flagpost':
				$field = new WanderersMkdfFieldFlagPost();
				$field->render( $name, $label, $description, $options, $args );
				break;
			case 'flagpage':
				$field = new WanderersMkdfFieldFlagPage();
				$field->render( $name, $label, $description, $options, $args );
				break;
			case 'flagmedia':
				$field = new WanderersMkdfFieldFlagMedia();
				$field->render( $name, $label, $description, $options, $args );
				break;
			case 'flagportfolio':
				$field = new WanderersMkdfFieldFlagPortfolio();
				$field->render( $name, $label, $description, $options, $args );
				break;
			case 'flagproduct':
				$field = new WanderersMkdfFieldFlagProduct();
				$field->render( $name, $label, $description, $options, $args );
				break;
			case 'range':
				$field = new WanderersMkdfFieldRange();
				$field->render( $name, $label, $description, $options, $args );
				break;
			case 'rangesimple':
				$field = new WanderersMkdfFieldRangeSimple();
				$field->render( $name, $label, $description, $options, $args );
				break;
			case 'radio':
				$field = new WanderersMkdfFieldRadio();
				$field->render( $name, $label, $description, $options, $args );
				break;
			case 'checkbox':
				$field = new WanderersMkdfFieldCheckBox();
				$field->render( $name, $label, $description, $options, $args );
				break;
			case 'date':
				$field = new WanderersMkdfFieldDate();
				$field->render( $name, $label, $description, $options, $args, $repeat );
				break;
            case 'radiogroup':
                $field = new WanderersMkdfFieldRadioGroup();
                $field->render( $name, $label, $description, $options, $args );
                break;
            case 'checkboxgroup':
                $field = new WanderersMkdfFieldCheckBoxGroup();
                $field->render( $name, $label, $description, $options, $args, $repeat );
                break;
            case 'address':
                $field = new WanderersMkdfFieldAddress();
                $field->render( $name, $label, $description, $options, $args, $repeat );
                break;
            case 'icon':
                $field = new WanderersMkdfFieldIcon();
                $field->render( $name, $label, $description, $options, $args, $repeat );
                break;
			default:
				break;
		}
	}
}