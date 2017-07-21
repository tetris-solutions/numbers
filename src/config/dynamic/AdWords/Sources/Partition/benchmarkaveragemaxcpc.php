<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\AdWords\Source\Source_FloatParser_Parsable;

return new class extends Source_FloatParser_Parsable {
	public $id = "benchmarkaveragemaxcpc";
	public $metric = "benchmarkaveragemaxcpc";
	public $entity = "Partition";
	public $platform = "adwords";
	public $report = "PRODUCT_PARTITION_REPORT";
	public $fields = ["BenchmarkAverageMaxCpc"];
	public $property = "BenchmarkAverageMaxCpc";
	public $type = "currency";
};
