<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\Metric\Metric_IntegerParser_TrivialSum_Parsable_Summable;

return new class extends Metric_IntegerParser_TrivialSum_Parsable_Summable {

	public $entity = 'Order';

	public $fields = [
	    "item_rewardValue"
	];

	public $group = 'get';

	public $id = 'item_rewardvalue';

	public $metric = 'item_rewardvalue';

	public $platform = 'vtex';

	public $property = 'item_rewardValue';

	public $report = 'VTEX_ORDER';

	public $type = 'integer';
};
