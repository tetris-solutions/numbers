<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\Source\Source_IntegerParser_TrivialSum_Parsable_Summable;

return new class extends Source_IntegerParser_TrivialSum_Parsable_Summable {

	public $entity = 'Partition';

	public $fields = [
	    "Impressions"
	];

	public $id = 'impressions';

	public $metric = 'impressions';

	public $platform = 'adwords';

	public $property = 'Impressions';

	public $report = 'PRODUCT_PARTITION_REPORT';

	public $type = 'integer';
};
