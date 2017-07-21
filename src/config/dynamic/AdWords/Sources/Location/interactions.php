<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\AdWords\Source\Source_IntegerParser_TrivialSum_Parsable_Summable;

return new class extends Source_IntegerParser_TrivialSum_Parsable_Summable {

	public $entity = 'Location';

	public $fields = [
	    "Interactions"
	];

	public $id = 'interactions';

	public $metric = 'interactions';

	public $platform = 'adwords';

	public $property = 'Interactions';

	public $report = 'GEO_PERFORMANCE_REPORT';

	public $type = 'integer';
};
