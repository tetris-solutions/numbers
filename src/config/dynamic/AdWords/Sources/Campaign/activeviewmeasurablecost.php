<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\AdWords\Source\Source_FloatParser_Parsable;

return new class extends Source_FloatParser_Parsable {
	public $id = "activeviewmeasurablecost";
	public $metric = "activeviewmeasurablecost";
	public $entity = "Campaign";
	public $platform = "adwords";
	public $report = "CAMPAIGN_PERFORMANCE_REPORT";
	public $fields = ["ActiveViewMeasurableCost"];
	public $property = "ActiveViewMeasurableCost";
	public $type = "currency";
};
