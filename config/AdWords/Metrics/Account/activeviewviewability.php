<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\Metric\Metric_FloatParser_TrivialSum_Parsable_Summable;

return new class extends Metric_FloatParser_TrivialSum_Parsable_Summable {

	public $entity = 'Account';

	public $fields = [
	    "ActiveViewViewability"
	];

	public $id = 'activeviewviewability';

	public $metric = 'activeviewviewability';

	public $platform = 'adwords';

	public $property = 'ActiveViewViewability';

	public $report = 'ACCOUNT_PERFORMANCE_REPORT';

	public $type = 'decimal';
};
