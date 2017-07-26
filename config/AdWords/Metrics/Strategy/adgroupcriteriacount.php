<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\Shared\Metric\Metric_IntegerParser_TrivialSum_Parsable_Summable;

return new class extends Metric_IntegerParser_TrivialSum_Parsable_Summable {

	public $entity = 'Strategy';

	public $fields = [
	    "AdGroupCriteriaCount"
	];

	public $id = 'adgroupcriteriacount';

	public $metric = 'adgroupcriteriacount';

	public $platform = 'adwords';

	public $property = 'AdGroupCriteriaCount';

	public $report = 'BID_GOAL_PERFORMANCE_REPORT';

	public $type = 'integer';
};
