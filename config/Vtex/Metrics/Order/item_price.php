<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\Metric\Metric_IntegerParser_TrivialSum_Parsable_Summable;

return new class extends Metric_IntegerParser_TrivialSum_Parsable_Summable {

	public $entity = 'Order';

	public $fields = [
	    "item_price"
	];

	public $group = 'list';

	public $id = 'item_price';

	public $metric = 'item_price';

	public $platform = 'vtex';

	public $property = 'item_price';

	public $report = 'VTEX_ORDER';

	public $type = 'integer';
};
