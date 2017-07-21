<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\AdWords\Source\Source_PercentParser_Parsable;

return new class extends Source_PercentParser_Parsable {
	public $id = "bouncerate";
	public $metric = "bouncerate";
	public $entity = "Campaign";
	public $platform = "adwords";
	public $report = "CAMPAIGN_PERFORMANCE_REPORT";
	public $fields = ["BounceRate"];
	public $property = "BounceRate";
	public $type = "percentage";
};
