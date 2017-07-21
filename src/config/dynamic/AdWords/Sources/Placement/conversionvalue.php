<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\AdWords\Source\Source_FloatParser_TrivialSum_Parsable_Summable;

return new class extends Source_FloatParser_TrivialSum_Parsable_Summable {
	public $id = "conversionvalue";
	public $metric = "conversionvalue";
	public $entity = "Placement";
	public $platform = "adwords";
	public $report = "AUTOMATIC_PLACEMENTS_PERFORMANCE_REPORT";
	public $fields = ["ConversionValue"];
	public $property = "ConversionValue";
	public $type = "decimal";
};
