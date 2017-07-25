<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\Source\Source_FloatParser_TrivialSum_Parsable_Summable;

return new class extends Source_FloatParser_TrivialSum_Parsable_Summable {

	public $entity = 'Placement';

	public $fields = [
	    "ActiveViewMeasurability"
	];

	public $id = 'activeviewmeasurability';

	public $metric = 'activeviewmeasurability';

	public $platform = 'adwords';

	public $property = 'ActiveViewMeasurability';

	public $report = 'AUTOMATIC_PLACEMENTS_PERFORMANCE_REPORT';

	public $type = 'decimal';
};
