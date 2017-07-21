<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\AdWords\Source\Source_FloatParser_TrivialSum_Parsable_Summable;

return new class extends Source_FloatParser_TrivialSum_Parsable_Summable {
	public $id = "costpercurrentmodelattributedconversion";
	public $metric = "costpercurrentmodelattributedconversion";
	public $entity = "Campaign";
	public $platform = "adwords";
	public $report = "CAMPAIGN_PERFORMANCE_REPORT";
	public $fields = ["CostPerCurrentModelAttributedConversion"];
	public $property = "CostPerCurrentModelAttributedConversion";
	public $type = "decimal";
};
