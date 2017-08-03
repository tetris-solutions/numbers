<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\Metric\Metric_IntegerParser_TrivialSum_Parsable_Summable;

return new class extends Metric_IntegerParser_TrivialSum_Parsable_Summable {

	public $entity = 'Order';

	public $fields = [
	    "item_sellingPrice"
	];

	public $id = 'item_sellingprice';

	public $metric = 'item_sellingprice';

	public $platform = 'vtex';

	public $property = 'item_sellingPrice';

	public $report = 'VTEX_ORDER';

	public $type = 'integer';
};
