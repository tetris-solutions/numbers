<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\Metric\Metric_FloatParser_TrivialSum_Parsable_Summable;

return new class extends Metric_FloatParser_TrivialSum_Parsable_Summable {

	public $entity = 'Account';

	public $fields = [
	    "ActiveViewCtr"
	];

	public $id = 'activeviewctr';

	public $metric = 'activeviewctr';

	public $platform = 'adwords';

	public $property = 'ActiveViewCtr';

	public $report = 'ACCOUNT_PERFORMANCE_REPORT';

	public $type = 'decimal';
};
