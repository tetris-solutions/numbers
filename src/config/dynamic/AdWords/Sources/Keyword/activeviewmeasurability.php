<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\AdWords\Source\Source_FloatParser_TrivialSum_Parsable_Summable;

return new class extends Source_FloatParser_TrivialSum_Parsable_Summable {

	public $entity = 'Keyword';

	public $fields = [
	    "ActiveViewMeasurability"
	];

	public $id = 'activeviewmeasurability';

	public $metric = 'activeviewmeasurability';

	public $platform = 'adwords';

	public $property = 'ActiveViewMeasurability';

	public $report = 'KEYWORDS_PERFORMANCE_REPORT';

	public $type = 'decimal';
};
