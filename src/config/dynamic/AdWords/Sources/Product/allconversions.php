<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\AdWords\Source\Source_FloatParser_TrivialSum_Parsable_Summable;

return new class extends Source_FloatParser_TrivialSum_Parsable_Summable {

	public $entity = 'Product';

	public $fields = [
	    "AllConversions"
	];

	public $id = 'allconversions';

	public $metric = 'allconversions';

	public $platform = 'adwords';

	public $property = 'AllConversions';

	public $report = 'SHOPPING_PERFORMANCE_REPORT';

	public $type = 'decimal';
};
