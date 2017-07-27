<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\Metric\Metric_RawParser_Parsable;

return new class extends Metric_RawParser_Parsable {

	public $entity = 'Location';

	public $fields = [
	    "InteractionTypes"
	];

	public $id = 'interactiontypes';

	public $metric = 'interactiontypes';

	public $platform = 'adwords';

	public $property = 'InteractionTypes';

	public $report = 'GEO_PERFORMANCE_REPORT';

	public $type = 'enumset';
};
