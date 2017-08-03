<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\Metric\Metric_IntegerParser_TrivialSum_Parsable_Summable;

return new class extends Metric_IntegerParser_TrivialSum_Parsable_Summable {

	public $entity = 'Order';

	public $fields = [
	    "item_commission"
	];

	public $id = 'item_commission';

	public $metric = 'item_commission';

	public $platform = 'vtex';

	public $property = 'item_commission';

	public $report = 'VTEX_ORDER';

	public $type = 'integer';
};
