<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\Shared\Metric\Metric_FloatParser_TrivialSum_Parsable_Summable;

return new class extends Metric_FloatParser_TrivialSum_Parsable_Summable {

	public $entity = 'Ad';

	public $fields = [
	    "ActiveViewViewability"
	];

	public $id = 'activeviewviewability';

	public $metric = 'activeviewviewability';

	public $platform = 'adwords';

	public $property = 'ActiveViewViewability';

	public $report = 'AD_PERFORMANCE_REPORT';

	public $type = 'decimal';
};
