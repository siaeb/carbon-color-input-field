<?php

use Carbon_Fields\Carbon_Fields;
use Carbon_Field_Color_Input\Color_Input_Field;

$constant = 'Carbon_Field_Color_Input\\DIR';
if (!defined($constant)) {
	define($constant, __DIR__);
}

require_once __DIR__ . '/core/EnumColorInputShape.php';
require_once __DIR__ . '/core/EnumColorInputDirection.php';
require_once __DIR__ . '/core/Color_Input_Field.php';

Carbon_Fields::extend( Color_Input_Field::class, function( $container ) {
	return new Color_Input_Field(
		$container['arguments']['type'],
		$container['arguments']['name'],
		$container['arguments']['label']
	);
} );
