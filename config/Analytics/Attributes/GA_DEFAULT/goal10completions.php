<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\Attribute\Attribute_RawParser_Parsable;

return new class extends Attribute_RawParser_Parsable {

	public $id = 'goal10completions';

	public $is_dimension = false;

	public $is_filter = false;

	public $is_metric = true;

	public $is_percentage = false;

	public $platform = 'analytics';

	public $property = 'ga:goal10Completions';

	public $type = 'integer';
};
