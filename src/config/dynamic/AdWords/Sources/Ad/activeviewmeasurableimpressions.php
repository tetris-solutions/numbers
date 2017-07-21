<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\AdWords\Source\Source_IntegerParser_TrivialSum_Parsable_Summable;

return new class extends Source_IntegerParser_TrivialSum_Parsable_Summable {
	public $id = "activeviewmeasurableimpressions";
	public $metric = "activeviewmeasurableimpressions";
	public $entity = "Ad";
	public $platform = "adwords";
	public $report = "AD_PERFORMANCE_REPORT";
	public $fields = ["ActiveViewMeasurableImpressions"];
	public $property = "ActiveViewMeasurableImpressions";
	public $type = "integer";
};
