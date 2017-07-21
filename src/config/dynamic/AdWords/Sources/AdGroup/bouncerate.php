<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\AdWords\Source\PercentParser_Parsable;

return new class extends PercentParser_Parsable {
	public $id = "bouncerate";
	public $metric = "bouncerate";
	public $entity = "AdGroup";
	public $platform = "adwords";
	public $report = "ADGROUP_PERFORMANCE_REPORT";
	public $fields = ["BounceRate"];
	public $property = "BounceRate";
	public $type = "percentage";
};
