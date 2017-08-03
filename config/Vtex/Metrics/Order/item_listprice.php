<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\Metric\Metric_IntegerParser_TrivialSum_Parsable_Summable;

return new class extends Metric_IntegerParser_TrivialSum_Parsable_Summable {

	public $entity = 'Order';

	public $fields = [
	    "item_listPrice"
	];

	public $group = 'get';

	public $id = 'item_listprice';

	public $metric = 'item_listprice';

	public $platform = 'vtex';

	public $property = 'item_listPrice';

	public $report = 'VTEX_ORDER';

	public $type = 'integer';
};
