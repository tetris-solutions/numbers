<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\Metric\Metric_IntegerParser_TrivialSum_Parsable_Summable;

return new class extends Metric_IntegerParser_TrivialSum_Parsable_Summable {

	public $entity = 'Strategy';

	public $fields = [
	    "NonRemovedAdGroupCriteriaCount"
	];

	public $id = 'nonremovedadgroupcriteriacount';

	public $metric = 'nonremovedadgroupcriteriacount';

	public $platform = 'adwords';

	public $property = 'NonRemovedAdGroupCriteriaCount';

	public $report = 'BID_GOAL_PERFORMANCE_REPORT';

	public $type = 'integer';
};
