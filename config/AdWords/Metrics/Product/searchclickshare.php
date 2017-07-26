<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\Shared\Metric\Metric_ComplexValueParser_Parsable;

return new class extends Metric_ComplexValueParser_Parsable {

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
