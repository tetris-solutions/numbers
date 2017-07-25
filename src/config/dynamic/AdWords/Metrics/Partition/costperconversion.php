<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\Metric\Metric_FloatParser_RatioSum_Parsable_Summable;

return new class extends Metric_FloatParser_RatioSum_Parsable_Summable {

	public $dividendMetric = 'cost';

	public $divisorMetric = 'conversions';

	public $entity = 'Partition';

	public $fields = [
	    "CostPerConversion"
	];

	public $id = 'costperconversion';

	public $inferred_from = [
	    "cost",
	    "conversions"
	];

	public $metric = 'costperconversion';

	public $platform = 'adwords';

	public $property = 'CostPerConversion';

	public $report = 'PRODUCT_PARTITION_REPORT';

	public $type = 'currency';
};
