<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\Shared\Metric\Metric_PercentParser_Parsable;

return new class extends Metric_PercentParser_Parsable {

	public $entity = 'Ad';

	public $fields = [
	    "PercentNewVisitors"
	];

	public $id = 'percentnewvisitors';

	public $metric = 'percentnewvisitors';

	public $platform = 'adwords';

	public $property = 'PercentNewVisitors';

	public $report = 'AD_PERFORMANCE_REPORT';

	public $type = 'percentage';
};
