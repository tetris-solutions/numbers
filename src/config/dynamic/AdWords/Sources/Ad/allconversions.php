<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\AdWords\Source\Source_FloatParser_TrivialSum_Parsable_Summable;

return new class extends Source_FloatParser_TrivialSum_Parsable_Summable {
	public $id = "allconversions";
	public $metric = "allconversions";
	public $entity = "Ad";
	public $platform = "adwords";
	public $report = "AD_PERFORMANCE_REPORT";
	public $fields = ["AllConversions"];
	public $property = "AllConversions";
	public $type = "decimal";
};
