<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\Metric\Metric_FloatParser_TrivialSum_Parsable_Summable;

return new class extends Metric_FloatParser_TrivialSum_Parsable_Summable {

	public $entity = 'Partition';

	public $fields = [
	    "AllConversions"
	];

	public $id = 'allconversions';

	public $metric = 'allconversions';

	public $platform = 'adwords';

	public $property = 'AllConversions';

	public $report = 'PRODUCT_PARTITION_REPORT';

	public $type = 'decimal';
};
