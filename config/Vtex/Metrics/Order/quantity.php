<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\Metric\Metric_IntegerParser_TrivialSum_Parsable_Summable;

return new class extends Metric_IntegerParser_TrivialSum_Parsable_Summable {

	public $entity = 'Order';

	public $fields = [
	    "quantity"
	];

	public $id = 'quantity';

	public $metric = 'quantity';

	public $platform = 'vtex';

	public $property = 'quantity';

	public $report = 'VTEX_ORDER';

	public $type = 'integer';
};
