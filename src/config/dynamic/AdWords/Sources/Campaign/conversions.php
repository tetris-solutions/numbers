<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\AdWords\Source\FloatParser_TrivialSum_Parsable_Summable;

return new class extends FloatParser_TrivialSum_Parsable_Summable {
	public $id = "conversions";
	public $metric = "conversions";
	public $entity = "Campaign";
	public $platform = "adwords";
	public $report = "CAMPAIGN_PERFORMANCE_REPORT";
	public $fields = ["Conversions"];
	public $property = "Conversions";
	public $type = "decimal";
};
