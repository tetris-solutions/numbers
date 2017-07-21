<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\AdWords\Source\Source_FloatParser_TrivialSum_Parsable_Summable;

return new class extends Source_FloatParser_TrivialSum_Parsable_Summable {

	public $entity = 'Partition';

	public $fields = [
	    "Conversions"
	];

	public $id = 'conversions';

	public $metric = 'conversions';

	public $platform = 'adwords';

	public $property = 'Conversions';

	public $report = 'PRODUCT_PARTITION_REPORT';

	public $type = 'decimal';
};
