<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\AdWords\Source\Source_FloatParser_TrivialSum_Parsable_Summable;

return new class extends Source_FloatParser_TrivialSum_Parsable_Summable {

	public $entity = 'Budget';

	public $fields = [
	    "Cost"
	];

	public $id = 'cost';

	public $metric = 'cost';

	public $platform = 'adwords';

	public $property = 'Cost';

	public $report = 'BUDGET_PERFORMANCE_REPORT';

	public $type = 'currency';
};
