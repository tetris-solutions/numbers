<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\Shared\Metric\Metric_FloatParser_TrivialSum_Parsable_Summable;

return new class extends Metric_FloatParser_TrivialSum_Parsable_Summable {

	public $entity = 'Account';

	public $fields = [
	    "ActiveViewMeasurability"
	];

	public $id = 'activeviewmeasurability';

	public $metric = 'activeviewmeasurability';

	public $platform = 'adwords';

	public $property = 'ActiveViewMeasurability';

	public $report = 'ACCOUNT_PERFORMANCE_REPORT';

	public $type = 'decimal';
};
