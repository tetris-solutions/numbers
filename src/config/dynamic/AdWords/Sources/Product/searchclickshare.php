<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\Source\Source_ComplexValueParser_Parsable;

return new class extends Source_ComplexValueParser_Parsable {

	public $entity = 'Product';

	public $fields = [
	    "SearchClickShare"
	];

	public $id = 'searchclickshare';

	public $metric = 'searchclickshare';

	public $platform = 'adwords';

	public $property = 'SearchClickShare';

	public $report = 'SHOPPING_PERFORMANCE_REPORT';

	public $type = 'special';
};
