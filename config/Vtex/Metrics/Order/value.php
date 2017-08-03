<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\Metric\Metric_IntegerParser_TrivialSum_Parsable_Summable;

return new class extends Metric_IntegerParser_TrivialSum_Parsable_Summable {

	public $entity = 'Order';

	public $fields = [
	    "value"
	];

	public $group = 'get';

	public $id = 'value';

	public $metric = 'value';

	public $platform = 'vtex';

	public $property = 'value';

	public $report = 'VTEX_ORDER';

	public $type = 'integer';
};
