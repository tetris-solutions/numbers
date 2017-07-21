<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\AdWords\Source\FloatParser_TrivialSum_Parsable_Summable;

return new class extends FloatParser_TrivialSum_Parsable_Summable {
	public $id = "impressionassistedconversionsoverlastclickconversions";
	public $metric = "impressionassistedconversionsoverlastclickconversions";
	public $entity = "AdGroup";
	public $platform = "adwords";
	public $report = "ADGROUP_PERFORMANCE_REPORT";
	public $fields = ["ImpressionAssistedConversionsOverLastClickConversions"];
	public $property = "ImpressionAssistedConversionsOverLastClickConversions";
	public $type = "decimal";
};
