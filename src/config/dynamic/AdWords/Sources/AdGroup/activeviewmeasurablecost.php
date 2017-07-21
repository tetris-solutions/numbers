<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\AdWords\Source\Source_FloatParser_Parsable;

return new class extends Source_FloatParser_Parsable {
	public $id = "activeviewmeasurablecost";
	public $metric = "activeviewmeasurablecost";
	public $entity = "AdGroup";
	public $platform = "adwords";
	public $report = "ADGROUP_PERFORMANCE_REPORT";
	public $fields = ["ActiveViewMeasurableCost"];
	public $property = "ActiveViewMeasurableCost";
	public $type = "currency";
};
