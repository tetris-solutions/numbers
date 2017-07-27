<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\Metric\Metric_RawParser_Parsable;

return new class extends Metric_RawParser_Parsable {

	public $entity = 'Audience';

	public $fields = [
	    "InteractionTypes"
	];

	public $id = 'interactiontypes';

	public $metric = 'interactiontypes';

	public $platform = 'adwords';

	public $property = 'InteractionTypes';

	public $report = 'AUDIENCE_PERFORMANCE_REPORT';

	public $type = 'enumset';
};
