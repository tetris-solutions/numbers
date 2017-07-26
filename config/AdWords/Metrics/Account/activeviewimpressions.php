<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\Shared\Metric\Metric_IntegerParser_TrivialSum_Parsable_Summable;

return new class extends Metric_IntegerParser_TrivialSum_Parsable_Summable {

	public $entity = 'Account';

	public $fields = [
	    "ActiveViewImpressions"
	];

	public $id = 'activeviewimpressions';

	public $metric = 'activeviewimpressions';

	public $platform = 'adwords';

	public $property = 'ActiveViewImpressions';

	public $report = 'ACCOUNT_PERFORMANCE_REPORT';

	public $type = 'integer';
};
