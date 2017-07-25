<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\Metric\Metric_FloatParser_Parsable;

return new class extends Metric_FloatParser_Parsable {

	public $entity = 'AdGroup';

	public $fields = [
	    "ActiveViewMeasurableCost"
	];

	public $id = 'activeviewmeasurablecost';

	public $metric = 'activeviewmeasurablecost';

	public $platform = 'adwords';

	public $property = 'ActiveViewMeasurableCost';

	public $report = 'ADGROUP_PERFORMANCE_REPORT';

	public $type = 'currency';
};
