<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\Metric\Metric_FloatParser_TrivialSum_Parsable_Summable;

return new class extends Metric_FloatParser_TrivialSum_Parsable_Summable {

	public $entity = 'Partition';

	public $fields = [
	    "CrossDeviceConversions"
	];

	public $id = 'crossdeviceconversions';

	public $metric = 'crossdeviceconversions';

	public $platform = 'adwords';

	public $property = 'CrossDeviceConversions';

	public $report = 'PRODUCT_PARTITION_REPORT';

	public $type = 'decimal';
};
