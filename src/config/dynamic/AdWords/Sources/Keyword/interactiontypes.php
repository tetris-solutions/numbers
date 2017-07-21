<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\AdWords\Source\Source_RawParser_Parsable;

return new class extends Source_RawParser_Parsable {

	public $entity = 'Keyword';

	public $fields = [
	    "InteractionTypes"
	];

	public $id = 'interactiontypes';

	public $metric = 'interactiontypes';

	public $platform = 'adwords';

	public $property = 'InteractionTypes';

	public $report = 'KEYWORDS_PERFORMANCE_REPORT';

	public $type = 'raw';
};
