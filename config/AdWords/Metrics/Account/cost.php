<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\Shared\Metric\Metric_FloatParser_TrivialSum_Parsable_Summable;

return new class extends Metric_FloatParser_TrivialSum_Parsable_Summable {

	public $entity = 'Account';

	public $fields = [
	    "Cost"
	];

	public $id = 'cost';

	public $metric = 'cost';

	public $platform = 'adwords';

	public $property = 'Cost';

	public $report = 'ACCOUNT_PERFORMANCE_REPORT';

	public $type = 'currency';
};
