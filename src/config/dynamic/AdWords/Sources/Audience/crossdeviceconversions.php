<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\AdWords\Source\FloatParser_TrivialSum_Parsable_Summable;

return new class extends FloatParser_TrivialSum_Parsable_Summable {
	public $id = "crossdeviceconversions";
	public $metric = "crossdeviceconversions";
	public $entity = "Audience";
	public $platform = "adwords";
	public $report = "AUDIENCE_PERFORMANCE_REPORT";
	public $fields = ["CrossDeviceConversions"];
	public $property = "CrossDeviceConversions";
	public $type = "decimal";
};
