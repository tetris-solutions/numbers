<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\Metric\Metric_IntegerParser_TrivialSum_Parsable_Summable;

return new class extends Metric_IntegerParser_TrivialSum_Parsable_Summable {

	public $entity = 'Order';

	public $fields = [
	    "roundingError"
	];

	public $group = 'get';

	public $id = 'roundingerror';

	public $metric = 'roundingerror';

	public $platform = 'vtex';

	public $property = 'roundingError';

	public $report = 'VTEX_ORDER';

	public $type = 'integer';
};
