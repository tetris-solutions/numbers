<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\Attribute\Attribute_RawParser_Parsable;

return new class extends Attribute_RawParser_Parsable {

	public $id = 'goalconversionrateall';

	public $is_dimension = false;

	public $is_filter = false;

	public $is_metric = true;

	public $is_percentage = true;

	public $platform = 'analytics';

	public $property = 'ga:goalConversionRateAll';

	public $type = 'percentage';
};
