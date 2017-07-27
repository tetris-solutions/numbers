<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\Metric\Metric_PercentParser_Parsable;

return new class extends Metric_PercentParser_Parsable {

	public $entity = 'AdGroup';

	public $fields = [
	    "PercentNewVisitors"
	];

	public $id = 'percentnewvisitors';

	public $metric = 'percentnewvisitors';

	public $platform = 'adwords';

	public $property = 'PercentNewVisitors';

	public $report = 'ADGROUP_PERFORMANCE_REPORT';

	public $type = 'percentage';
};
