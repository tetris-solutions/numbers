<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\Source\Source_FloatParser_Parsable;

return new class extends Source_FloatParser_Parsable {

	public $entity = 'Partition';

	public $fields = [
	    "BenchmarkAverageMaxCpc"
	];

	public $id = 'benchmarkaveragemaxcpc';

	public $metric = 'benchmarkaveragemaxcpc';

	public $platform = 'adwords';

	public $property = 'BenchmarkAverageMaxCpc';

	public $report = 'PRODUCT_PARTITION_REPORT';

	public $type = 'currency';
};
