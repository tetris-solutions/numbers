<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\Shared\Metric\Metric_IntegerParser_TrivialSum_Parsable_Summable;

return new class extends Metric_IntegerParser_TrivialSum_Parsable_Summable {

	public $entity = 'Ad';

	public $fields = [
	    "ActiveViewMeasurableImpressions"
	];

	public $id = 'activeviewmeasurableimpressions';

	public $metric = 'activeviewmeasurableimpressions';

	public $platform = 'adwords';

	public $property = 'ActiveViewMeasurableImpressions';

	public $report = 'AD_PERFORMANCE_REPORT';

	public $type = 'integer';
};
