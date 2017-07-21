<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\AdWords\Source\FloatParser_TrivialSum_Parsable_Summable;

return new class extends FloatParser_TrivialSum_Parsable_Summable {
	public $id = "valuepercurrentmodelattributedconversion";
	public $metric = "valuepercurrentmodelattributedconversion";
	public $entity = "Ad";
	public $platform = "adwords";
	public $report = "AD_PERFORMANCE_REPORT";
	public $fields = ["ValuePerCurrentModelAttributedConversion"];
	public $property = "ValuePerCurrentModelAttributedConversion";
	public $type = "decimal";
};
