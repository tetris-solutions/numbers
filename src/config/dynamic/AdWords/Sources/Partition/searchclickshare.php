<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\AdWords\Source\Source_ComplexValueParser_Parsable;

return new class extends Source_ComplexValueParser_Parsable {

	public $entity = 'Partition';

	public $fields = [
	    "SearchClickShare"
	];

	public $id = 'searchclickshare';

	public $metric = 'searchclickshare';

	public $platform = 'adwords';

	public $property = 'SearchClickShare';

	public $report = 'PRODUCT_PARTITION_REPORT';

	public $type = 'special';
};
