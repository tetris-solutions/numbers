<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\AdWords\Source\Source_FloatParser_TrivialSum_Parsable_Summable;

return new class extends Source_FloatParser_TrivialSum_Parsable_Summable {
	public $id = "currentmodelattributedconversions";
	public $metric = "currentmodelattributedconversions";
	public $entity = "Campaign";
	public $platform = "adwords";
	public $report = "CAMPAIGN_PERFORMANCE_REPORT";
	public $fields = ["CurrentModelAttributedConversions"];
	public $property = "CurrentModelAttributedConversions";
	public $type = "decimal";
};
