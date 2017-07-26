<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\Shared\Metric\Metric_FloatParser_TrivialSum_Parsable_Summable;

return new class extends Metric_FloatParser_TrivialSum_Parsable_Summable {

	public $entity = 'Partition';

	public $fields = [
	    "BenchmarkCtr"
	];

	public $id = 'benchmarkctr';

	public $metric = 'benchmarkctr';

	public $platform = 'adwords';

	public $property = 'BenchmarkCtr';

	public $report = 'PRODUCT_PARTITION_REPORT';

	public $type = 'decimal';
};
