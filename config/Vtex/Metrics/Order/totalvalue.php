<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\Metric\Metric_IntegerParser_TrivialSum_Parsable_Summable;

return new class extends Metric_IntegerParser_TrivialSum_Parsable_Summable {

	public $entity = 'Order';

	public $fields = [
	    "totalValue"
	];

	public $id = 'totalvalue';

	public $metric = 'totalvalue';

	public $platform = 'vtex';

	public $property = 'totalValue';

	public $report = 'VTEX_ORDER';

	public $type = 'integer';
};
