<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\Shared\Metric\Metric_FloatParser_TrivialSum_Parsable_Summable;

return new class extends Metric_FloatParser_TrivialSum_Parsable_Summable {

	public $entity = 'Ad';

	public $fields = [
	    "ActiveViewCtr"
	];

	public $id = 'activeviewctr';

	public $metric = 'activeviewctr';

	public $platform = 'adwords';

	public $property = 'ActiveViewCtr';

	public $report = 'AD_PERFORMANCE_REPORT';

	public $type = 'decimal';
};
