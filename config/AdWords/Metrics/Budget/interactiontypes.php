<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\Shared\Metric\Metric_RawParser_Parsable;

return new class extends Metric_RawParser_Parsable {

	public $entity = 'Budget';

	public $fields = [
	    "InteractionTypes"
	];

	public $id = 'interactiontypes';

	public $metric = 'interactiontypes';

	public $platform = 'adwords';

	public $property = 'InteractionTypes';

	public $report = 'BUDGET_PERFORMANCE_REPORT';

	public $type = 'enumset';
};
