<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\Shared\Metric\Metric_FloatParser_TrivialSum_Parsable_Summable;

return new class extends Metric_FloatParser_TrivialSum_Parsable_Summable {

	public $entity = 'Category';

	public $fields = [
	    "CrossDeviceConversions"
	];

	public $id = 'crossdeviceconversions';

	public $metric = 'crossdeviceconversions';

	public $platform = 'adwords';

	public $property = 'CrossDeviceConversions';

	public $report = 'KEYWORDLESS_CATEGORY_REPORT';

	public $type = 'decimal';
};
