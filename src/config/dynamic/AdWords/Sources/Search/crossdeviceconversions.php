<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\AdWords\Source\Source_FloatParser_TrivialSum_Parsable_Summable;

return new class extends Source_FloatParser_TrivialSum_Parsable_Summable {

	public $entity = 'Search';

	public $fields = [
	    "CrossDeviceConversions"
	];

	public $id = 'crossdeviceconversions';

	public $metric = 'crossdeviceconversions';

	public $platform = 'adwords';

	public $property = 'CrossDeviceConversions';

	public $report = 'SEARCH_QUERY_PERFORMANCE_REPORT';

	public $type = 'decimal';
};
