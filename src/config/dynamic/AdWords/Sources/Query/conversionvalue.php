<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\AdWords\Source\Source_FloatParser_TrivialSum_Parsable_Summable;

return new class extends Source_FloatParser_TrivialSum_Parsable_Summable {
	public $id = "conversionvalue";
	public $metric = "conversionvalue";
	public $entity = "Query";
	public $platform = "adwords";
	public $report = "KEYWORDLESS_QUERY_REPORT";
	public $fields = ["ConversionValue"];
	public $property = "ConversionValue";
	public $type = "decimal";
};
