<?php

namespace Carbon_Field_Color_Input;

use Carbon_Fields\Field\Field;
use Carbon_Fields\Field\Radio_Field;

class Color_Input_Field extends Radio_Field {

	/**
	 * @var string
	 */
	protected $shape = EnumColorInputShape::Square;

	/**
	 * @var bool
	 */
	protected $disabled = false;

	/**
	 * @var string
	 */
	protected $radio_class = '';

	/**
	 * @var string
	 */
	protected $label_class = '';

	/**
	 * @var string
	 */
	protected $color_width = 20;

	/**
	 * @var string
	 */
	protected $color_height = 20;

	/**
	 * @var string
	 */
	protected $direction = EnumColorInputDirection::Horizontal;

	/**
	 * Prepare the field type for use.
	 * Called once per field type when activated.
	 *
	 * @static
	 * @access public
	 *
	 * @return void
	 */
	public static function field_type_activated() {
		$dir    = \Carbon_Field_Color_Input\DIR . '/languages/';
		$locale = get_locale();
		$path   = $dir . $locale . '.mo';
		load_textdomain( 'carbon-field-Color_Input', $path );
	}

	/**
	 * Enqueue scripts and styles in admin.
	 * Called once per field type.
	 *
	 * @static
	 * @access public
	 *
	 * @return void
	 */
	public static function admin_enqueue_scripts() {
		$root_uri = \Carbon_Fields\Carbon_Fields::directory_to_url( \Carbon_Field_Color_Input\DIR );
		// Enqueue field styles.
		wp_enqueue_style( 'carbon-field-Color_Input', $root_uri . '/build/bundle' . (defined('SCRIPT_DEBUG') && SCRIPT_DEBUG ? '' : '.min') . '.css' );
		// Enqueue field scripts.
		wp_enqueue_script( 'carbon-field-Color_Input', $root_uri . '/build/bundle' . (defined('SCRIPT_DEBUG') && SCRIPT_DEBUG ? '' : '.min') . '.js', array( 'carbon-fields-core' ) );
	}

	/**
	 * @return string
	 */
	public function get_shape(): string {
		return $this->shape;
	}

	/**
	 * @param string $shape
	 */
	public function set_shape( string $shape ): Color_Input_Field {
		$this->shape = $shape;
		return $this;
	}

	/**
	 * @return bool
	 */
	public function is_disabled(): bool {
		return $this->disabled;
	}

	/**
	 * @param bool $disabled
	 */
	public function set_disabled( bool $disabled ): Color_Input_Field {
		$this->disabled = $disabled;

		return $this;
	}

	/**
	 * @return string
	 */
	public function get_radio_class(): string {
		return $this->radio_class;
	}

	/**
	 * @param string $radio_class
	 */
	public function set_radio_class( string $radio_class ): Color_Input_Field {
		$this->radio_class = $radio_class;

		return $this;
	}

	/**
	 * @return string
	 */
	public function get_label_class(): string {
		return $this->label_class;
	}

	/**
	 * @param string $label_class
	 */
	public function set_label_class( string $label_class ): Color_Input_Field {
		$this->label_class = $label_class;

		return $this;
	}

	/**
	 * @return string
	 */
	public function get_color_width(): string {
		return $this->color_width;
	}

	/**
	 * @param string $color_width
	 */
	public function set_color_width( string $color_width ): Color_Input_Field {
		$this->color_width = $color_width;

		return $this;
	}

	/**
	 * @return string
	 */
	public function get_color_height(): string {
		return $this->color_height;
	}

	/**
	 * @param string $color_height
	 */
	public function set_color_height( string $color_height ): Color_Input_Field {
		$this->color_height = $color_height;

		return $this;
	}

	/**
	 * @return string
	 */
	public function get_direction(): string {
		return $this->direction;
	}

	/**
	 * @param string $direction
	 */
	public function set_direction( string $direction ): Color_Input_Field {
		$this->direction = $direction;

		return $this;
	}

	/**
	 * @param bool $load
	 *
	 * @return array
	 */
	public function to_json( $load ) {
		$data = parent::to_json( $load );

		return array_merge( $data, [
			'labelClass'  => $this->get_label_class(),
			'radioClass'  => $this->get_radio_class(),
			'isDisabled'  => $this->is_disabled(),
			'shape'       => $this->get_shape(),
			'colorWidth'  => $this->get_color_width(),
			'colorHeight' => $this->get_color_height(),
			'direction'   => $this->get_direction(),
		] );
	}

}
