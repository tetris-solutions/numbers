<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\Source\Source_RawParser_Parsable;

return new class extends Source_RawParser_Parsable {

	public $entity = 'Placement';

	public $fields = [
	    "InteractionTypes"
	];

	public $id = 'interactiontypes';

	public $metric = 'interactiontypes';

	public $platform = 'adwords';

	public $property = 'InteractionTypes';

	public $report = 'AUTOMATIC_PLACEMENTS_PERFORMANCE_REPORT';

	public $type = 'enumset';
};
