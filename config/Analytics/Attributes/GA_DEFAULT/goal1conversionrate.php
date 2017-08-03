<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\Attribute\Attribute_RawParser_Parsable;

return new class extends Attribute_RawParser_Parsable {

	public $group = 'METRIC';

	public $id = 'goal1conversionrate';

	public $is_dimension = false;

	public $is_filter = false;

	public $is_metric = true;

	public $is_percentage = true;

	public $platform = 'analytics';

	public $property = 'ga:goal1ConversionRate';

	public $type = 'percentage';
};
