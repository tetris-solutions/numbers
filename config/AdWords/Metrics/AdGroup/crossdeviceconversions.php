<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\Metric\Metric_FloatParser_TrivialSum_Parsable_Summable;

return new class extends Metric_FloatParser_TrivialSum_Parsable_Summable {

	public $entity = 'AdGroup';

	public $fields = [
	    "CrossDeviceConversions"
	];

	public $id = 'crossdeviceconversions';

	public $metric = 'crossdeviceconversions';

	public $platform = 'adwords';

	public $property = 'CrossDeviceConversions';

	public $report = 'ADGROUP_PERFORMANCE_REPORT';

	public $type = 'decimal';
};
