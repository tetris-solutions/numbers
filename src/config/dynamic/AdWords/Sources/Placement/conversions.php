<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\AdWords\Source\Source_FloatParser_TrivialSum_Parsable_Summable;

return new class extends Source_FloatParser_TrivialSum_Parsable_Summable {

	public $entity = 'Placement';

	public $fields = [
	    "Conversions"
	];

	public $id = 'conversions';

	public $metric = 'conversions';

	public $platform = 'adwords';

	public $property = 'Conversions';

	public $report = 'AUTOMATIC_PLACEMENTS_PERFORMANCE_REPORT';

	public $type = 'decimal';
};
