<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\AdWords\Source\Source_IntegerParser_TrivialSum_Parsable_Summable;

return new class extends Source_IntegerParser_TrivialSum_Parsable_Summable {

	public $entity = 'Strategy';

	public $fields = [
	    "AdGroupCount"
	];

	public $id = 'adgroupcount';

	public $metric = 'adgroupcount';

	public $platform = 'adwords';

	public $property = 'AdGroupCount';

	public $report = 'BID_GOAL_PERFORMANCE_REPORT';

	public $type = 'integer';
};
