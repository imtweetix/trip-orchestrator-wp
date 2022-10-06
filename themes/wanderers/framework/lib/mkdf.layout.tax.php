<?php

/*
   Class: WanderersMkdfTaxonomyField
   A class that initializes WanderersMkdf Taxonomy Field
*/

class WanderersMkdfTaxonomyField implements iWanderersMkdfRender {
	private $type;
	private $name;
	private $label;
	private $description;
	private $options = array();
	private $args = array();
	private $hidden_property;
	private $hidden_values = array();

	function __construct( $type, $name, $label = "", $description = "", $options = array(), $args = array(), $hidden_property = "", $hidden_values = array() ) {
		$this->type        = $type;
		$this->name        = $name;
		$this->label       = $label;
		$this->description = $description;
		$this->options     = $options;
		$this->args        = $args;
		$this->hidden_property = $hidden_property;
		$this->hidden_values = $hidden_values;
		add_filter( 'wanderers_mkdf_taxonomy_fields', array( $this, 'addFieldForEditSave' ) );
	}
	
	public function addFieldForEditSave( $names ) {
		
		//for icon type of field add additonal icon font family based names for saving
		if ( $this->type == 'icon' ) {
			$icons_collections = \WanderersMkdfIconCollections::get_instance()->getIconCollectionsKeys();
			
			foreach ( $icons_collections as $icons_collection ) {
				$icons_param = \WanderersMkdfIconCollections::get_instance()->getIconCollectionParamNameByKey( $icons_collection );
				
				$names[] = $this->name . '_' . $icons_param;
			}
		}
		$names[] = $this->name;
		
		return $names;
	}
	
	public function render( $factory ) {
		$hidden = false;
		if (isset( $_GET['tag_ID'] ) ) {
			if ( ! empty( $this->hidden_property ) ) {
				foreach ( $this->hidden_values as $value ) {
					if ( get_term_meta( $_GET['tag_ID'], $this->hidden_property, true ) == $value ) {
						$hidden = true;
					}
				}
			}
		}
		$factory->render( $this->type, $this->name, $this->label, $this->description, $this->options, $this->args, $hidden );
	}
}

abstract class WanderersMkdfTaxonomyFieldType {
	abstract public function render( $name, $label = "", $description = "", $options = array(), $args = array() );
}

class WanderersMkdfTaxonomyFieldText extends WanderersMkdfTaxonomyFieldType {
	public function render( $name, $label = "", $description = "", $options = array(), $args = array(), $hidden = false ) {
		if ( ! isset( $_GET['tag_ID'] ) ) { ?>
			<div class="form-field">
				<label for="<?php echo esc_html( $name ); ?>"><?php echo esc_html( $label ); ?></label>
				<input type="text" name="<?php echo esc_html( $name ); ?>" id="<?php echo esc_html( $name ); ?>" value="">
				<p class="description"><?php echo esc_html( $description ); ?></p>
			</div>
			<?php
		} else {
			$value = get_term_meta( $_GET['tag_ID'], $name, true );
			?>
			<tr class="form-field" <?php if ($hidden) { ?> style="display: none"<?php } ?>>
				<th scope="row" valign="top">
					<label for="<?php echo esc_html( $name ); ?>"><?php echo esc_html( $label ); ?></label>
				</th>
				<td>
					<input type="text" name="<?php echo esc_html( $name ); ?>" id="<?php echo esc_html( $name ); ?>" value="<?php echo esc_attr( $value ) ? esc_attr( $value ) : ''; ?>">
					<p class="description"><?php echo esc_html( $description ); ?></p>
				</td>
			</tr>
			<?php
		}
	}
}

class WanderersMkdfTaxonomyFieldImage extends WanderersMkdfTaxonomyFieldType {
	public function render( $name, $label = "", $description = "", $options = array(), $args = array(), $hidden = false) {
		if ( ! isset( $_GET['tag_ID'] ) ) { ?>
			<div class="form-field">
				<label for="<?php echo esc_html( $name ); ?>"><?php echo esc_html( $label ); ?></label>
				<input type="hidden" name="<?php echo esc_html( $name ); ?>" id="<?php echo esc_html( $name ); ?>" class="mkdf-tax-custom-media-url" value="">
				<div class="mkdf-tax-image-wrapper"></div>
				<p>
					<input type="button" class="button button-secondary mkdf-tax-media-add" name="mkdf-tax-media-add" value="<?php esc_html_e( 'Add Image', 'wanderers' ); ?>"/>
					<input type="button" class="button button-secondary mkdf-tax-media-remove" name="mkdf-tax-media-remove" value="<?php esc_html_e( 'Remove Image', 'wanderers' ); ?>"/>
				</p>
			</div>
			<?php
		} else {
			global $taxonomy;
			$image_id = get_term_meta( $_GET['tag_ID'], $name, true );
			?>
			<tr class="form-field" <?php if ($hidden) { ?> style="display: none"<?php } ?>>
				<th scope="row">
					<label for="<?php echo esc_html( $name ); ?>"><?php echo esc_html( $label ); ?></label>
				</th>
				<td>
					<?php ?>
					<input type="hidden" name="<?php echo esc_html( $name ); ?>" id="<?php echo esc_html( $name ); ?>" value="<?php echo esc_attr( $image_id ); ?>" class="mkdf-tax-custom-media-url">
					<div class="mkdf-tax-image-wrapper">
						<?php if ( $image_id ) { ?>
							<?php echo wp_get_attachment_image( $image_id, 'thumbnail' ); ?>
						<?php } ?>
					</div>
					<p>
						<input type="button" class="button button-secondary mkdf-tax-media-add" name="mkdf-tax-media-add" value="<?php esc_html_e( 'Add Image', 'wanderers' ); ?>"/>
						<input data-termid="<?php echo esc_attr( $_GET['tag_ID'] ); ?>" data-taxonomy="<?php echo esc_attr( $taxonomy ); ?>" type="button" class="button button-secondary mkdf-tax-media-remove" name="mkdf-tax-media-remove" value="<?php esc_html_e( 'Remove Image', 'wanderers' ); ?>"/>
					</p>
				</td>
			</tr>
			<?php
		}
	}
}

class WanderersMkdfTaxonomyFieldSelect extends WanderersMkdfTaxonomyFieldType {
	public function render( $name, $label = "", $description = "", $options = array(), $args = array(), $hidden = false ) {

		$dependence = false;
		if(isset($args["dependence"])) {
			$dependence = true;
		}

		$show = array();
		if(isset($args["show"])) {
			$show = $args["show"];
		}

		$hide = array();
		if(isset($args["hide"])) {
			$hide = $args["hide"];
		}

		$select2 = '';
		if (isset($args['select2'])) {
			$select2 = 'mkdf-select2';
		}

		if ( ! isset( $_GET['tag_ID'] ) ) { ?>
			<div class="form-field">
				<label for="<?php echo esc_attr( $name ); ?>"><?php echo esc_html( $label ); ?></label>
				<select
                        class="<?php echo esc_attr($select2)?> form-control mkdf-form-element<?php if ($dependence) { echo " dependence"; } ?>"
                        name="<?php echo esc_attr( $name ); ?>"
					<?php foreach($show as $key=>$value) { ?>
                        data-show-<?php echo str_replace(' ', '',$key); ?>="<?php echo esc_attr($value); ?>"
					<?php } ?>
					<?php foreach($hide as $key=>$value) { ?>
                        data-hide-<?php echo str_replace(' ', '',$key); ?>="<?php echo esc_attr($value); ?>"
					<?php } ?>
                        id="<?php echo esc_attr( $name ); ?>">
					<?php if ( isset( $args['first_empty'] ) && $args['first_empty'] ) { ?>
						<option selected='selected' value=""></option>
					<?php } ?>
					<?php foreach ( $options as $key => $value ) {
						if ( $key == "-1" ) {
							$key = "";
						} ?>
						<option value="<?php echo esc_attr( $key ); ?>"><?php echo esc_html( $value ); ?></option>
					<?php } ?>
				</select>
				<p class="description"><?php echo esc_html( $description ); ?></p>
			</div>
			<?php
		} else {

			$selected_value = get_term_meta( $_GET['tag_ID'], $name, true );
			?>
			<tr class="form-field" <?php if ($hidden) { ?> style="display: none"<?php } ?>>
				<th scope="row" valign="top">
					<label for="<?php echo esc_attr( $name ); ?>"><?php echo esc_html( $label ); ?></label>
				</th>
				<td>
					<select name="<?php echo esc_attr( $name ); ?>"
                            class="<?php echo esc_attr($select2)?> mkdf-form-element<?php if ($dependence) { echo " dependence"; } ?>"
						<?php foreach($show as $key=>$value) { ?>
                            data-show-<?php echo str_replace(' ', '',$key); ?>="<?php echo esc_attr($value); ?>"
						<?php } ?>
						<?php foreach($hide as $key=>$value) { ?>
                            data-hide-<?php echo str_replace(' ', '',$key); ?>="<?php echo esc_attr($value); ?>"
						<?php } ?>
                            id="<?php echo esc_attr( $name ); ?>">
						<option <?php if ( $selected_value == "" ) { echo "selected='selected'"; } ?> value=""></option>
						<?php foreach ( $options as $key => $value ) {
							if ( $key == "-1" ) {
								$key = "";
							} ?>
							<option <?php if ( $selected_value == $key ) { echo "selected='selected'"; } ?> value="<?php echo esc_attr( $key ); ?>"><?php echo esc_html( $value ); ?></option>
						<?php } ?>
					</select>
					<p class="description"><?php echo esc_html( $description ); ?></p>
				</td>
			</tr>
			<?php
		}
	}
}

class WanderersMkdfTaxonomyFieldIcon extends WanderersMkdfTaxonomyFieldType {
	public function render( $name, $label = "", $description = "", $options = array(), $args = array(), $hidden = false ) {
		$options           = \WanderersMkdfIconCollections::get_instance()->getIconCollectionsEmpty();
		$icons_collections = \WanderersMkdfIconCollections::get_instance()->getIconCollectionsKeys();
		
		if ( ! isset( $_GET['tag_ID'] ) ) { ?>
			<div class="form-field">
				<label for="<?php echo esc_attr( $name ); ?>"><?php echo esc_html( $label ); ?></label>
				<select name="<?php echo esc_attr( $name ); ?>" id="<?php echo esc_attr( $name ); ?>" class="dependence">
					<?php foreach ( $options as $option => $key ) { ?>
						<option value="<?php echo esc_attr( $option ); ?>"><?php echo esc_attr( $key ); ?></option>
					<?php } ?>
				</select>
				<p class="description"><?php echo esc_html( $description ); ?></p>
			</div>
			<?php foreach ( $icons_collections as $icons_collection ) {
				$icons_param = \WanderersMkdfIconCollections::get_instance()->getIconCollectionParamNameByKey( $icons_collection );
				?>
				<div class="form-field mkd-icon-collection-holder" style="display: none" data-icon-collection="<?php echo esc_attr( $icons_collection ); ?>">
					<label for="<?php echo esc_attr( $name ) . '_icon'; ?>"><?php esc_html_e( 'Icon', 'wanderers' ); ?></label>
					<select name="<?php echo esc_attr( $name . '_' . $icons_param ) ?>" id="<?php echo esc_attr( $name . '_' . $icons_param ) ?>">
						<?php
						$icons = \WanderersMkdfIconCollections::get_instance()->getIconCollection( $icons_collection );
						foreach ( $icons->icons as $option => $key ) { ?>
							<option value="<?php echo esc_attr( $option ); ?>"><?php echo esc_attr( $key ); ?></option>
						<?php } ?>
					</select>
				</div>
			<?php } ?>
			<?php
		} else {
			$icon_pack = get_term_meta( $_GET['tag_ID'], $name, true );
			?>
			<tr class="form-field" <?php if ($hidden) { ?> style="display: none"<?php } ?>>
				<th scope="row">
					<label for="<?php echo esc_attr( $name ); ?>"><?php echo esc_html( $label ); ?></label>
				</th>
				<td>
					<select name="<?php echo esc_attr( $name ); ?>" id="<?php echo esc_attr( $name ); ?>" class="dependence">
						<?php foreach ( $options as $option => $key ) { ?>
							<option value="<?php echo esc_attr( $option ); ?>" <?php if ( $option == $icon_pack ) { echo 'selected'; } ?>><?php echo esc_attr( $key ); ?></option>
						<?php } ?>
					</select>
					<p class="description"><?php echo esc_html( $description ); ?></p>
				</td>
			</tr>
			<?php foreach ( $icons_collections as $icons_collection ) {
				$icons_param = \WanderersMkdfIconCollections::get_instance()->getIconCollectionParamNameByKey( $icons_collection );
				$style       = 'display:none';
				if ( $icon_pack == $icons_collection ) {
					$style = 'display:table-row';
				}
				?>
				<tr class="form-field mkd-icon-collection-holder" style="<?php echo esc_attr( $style ); ?>" data-icon-collection="<?php echo esc_attr( $icons_collection ); ?>">
					<th scope="row"><?php esc_html_e( 'Icon', 'wanderers' ); ?></th>
					<td>
						<select name="<?php echo esc_attr( $name . '_' . $icons_param ) ?>" id="<?php echo esc_attr( $name . '_' . $icons_param ) ?>">
							<?php
							$icons      = \WanderersMkdfIconCollections::get_instance()->getIconCollection( $icons_collection );
							$activ_icon = get_term_meta( $_GET['tag_ID'], $name . '_' . $icons_param, true );
							foreach ( $icons->icons as $option => $key ) { ?>
								<option value="<?php echo esc_attr( $option ); ?>" <?php if ( $option == $activ_icon ) { echo 'selected'; } ?>><?php echo esc_attr( $key ); ?></option>
							<?php } ?>
						</select>
					</td>
				</tr>
			<?php } ?>
			<?php
		}
	}
}

class WanderersMkdfTaxonomyFieldColor extends WanderersMkdfTaxonomyFieldType {
	public function render( $name, $label = "", $description = "", $options = array(), $args = array(), $hidden = false ) {
		
		if ( ! isset( $_GET['tag_ID'] ) ) { ?>
			<div class="form-field">
				<label for="<?php echo esc_html( $name ); ?>"><?php echo esc_html( $label ); ?></label>
				<input type="text" name="<?php echo esc_html( $name ); ?>" id="<?php echo esc_html( $name ); ?>" value="" class="mkdf-taxonomy-color-field">
				<p class="description"><?php echo esc_html( $description ); ?></p>
			</div>
			<?php
		} else {
			$value = get_term_meta( $_GET['tag_ID'], $name, true );
			?>
			<tr class="form-field" <?php if ($hidden) { ?> style="display: none"<?php } ?>>
				<th scope="row" valign="top">
					<label for="<?php echo esc_html( $name ); ?>"><?php echo esc_html( $label ); ?></label>
				</th>
				<td>
					<input type="text" name="<?php echo esc_html( $name ); ?>" id="<?php echo esc_html( $name ); ?>" value="<?php echo esc_attr( $value ) ? esc_attr( $value ) : ''; ?>" class="mkdf-taxonomy-color-field">
					<p class="description"><?php echo esc_html( $description ); ?></p>
				</td>
			</tr>
			<?php
		}
	}
}

class WanderersMkdfTaxonomyFieldFactory {
	public function render( $field_type, $name, $label = "", $description = "", $options = array(), $args = array(), $hidden = false ) {
		
		switch ( strtolower( $field_type ) ) {
			case 'text':
				$field = new WanderersMkdfTaxonomyFieldText();
				$field->render( $name, $label, $description, $options, $args, $hidden );
				break;
			
			case 'image':
				$field = new WanderersMkdfTaxonomyFieldImage();
				$field->render( $name, $label, $description, $options, $args, $hidden );
				break;
			
			case 'selectblank':
				$field = new WanderersMkdfTaxonomyFieldSelect();
				$field->render( $name, $label, $description, $options, $args, $hidden );
				break;
			
			case 'icon':
				$field = new WanderersMkdfTaxonomyFieldIcon();
				$field->render( $name, $label, $description, $options, $args, $hidden );
				break;
			
			case 'color':
				$field = new WanderersMkdfTaxonomyFieldColor();
				$field->render( $name, $label, $description, $options, $args, $hidden );
				break;
			
			default:
				break;
		}
	}
}
