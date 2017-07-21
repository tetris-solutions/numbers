<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\AdWords\Source\Source_FloatParser_TrivialSum_Parsable_Summable;

return new class extends Source_FloatParser_TrivialSum_Parsable_Summable {
	public $id = "impressionassistedconversionvalue";
	public $metric = "impressionassistedconversionvalue";
	public $entity = "Keyword";
	public $platform = "adwords";
	public $report = "KEYWORDS_PERFORMANCE_REPORT";
	public $fields = ["ImpressionAssistedConversionValue"];
	public $property = "ImpressionAssistedConversionValue";
	public $type = "decimal";
};
