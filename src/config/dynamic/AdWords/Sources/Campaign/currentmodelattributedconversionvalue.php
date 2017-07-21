<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\AdWords\Source\Source_FloatParser_TrivialSum_Parsable_Summable;

return new class extends Source_FloatParser_TrivialSum_Parsable_Summable {
	public $id = "currentmodelattributedconversionvalue";
	public $metric = "currentmodelattributedconversionvalue";
	public $entity = "Campaign";
	public $platform = "adwords";
	public $report = "CAMPAIGN_PERFORMANCE_REPORT";
	public $fields = ["CurrentModelAttributedConversionValue"];
	public $property = "CurrentModelAttributedConversionValue";
	public $type = "decimal";
};
