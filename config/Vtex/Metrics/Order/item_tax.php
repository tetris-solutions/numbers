<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\Metric\Metric_IntegerParser_TrivialSum_Parsable_Summable;

return new class extends Metric_IntegerParser_TrivialSum_Parsable_Summable {

	public $entity = 'Order';

	public $fields = [
	    "item_tax"
	];

	public $group = 'get';

	public $id = 'item_tax';

	public $metric = 'item_tax';

	public $platform = 'vtex';

	public $property = 'item_tax';

	public $report = 'VTEX_ORDER';

	public $type = 'integer';
};
