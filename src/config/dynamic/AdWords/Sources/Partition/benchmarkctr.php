<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\AdWords\Source\Source_FloatParser_TrivialSum_Parsable_Summable;

return new class extends Source_FloatParser_TrivialSum_Parsable_Summable {

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
