<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\Attribute\Attribute_DateParser_Parsable;

return new class extends Attribute_DateParser_Parsable {

	public $group = 'DIMENSION';

	public $id = 'date';

	public $is_dimension = true;

	public $is_filter = false;

	public $is_metric = false;

	public $is_percentage = false;

	public $platform = 'analytics';

	public $property = 'ga:date';

	public $type = 'string';
};
