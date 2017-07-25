<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\Source\Source_IntegerParser_TrivialSum_Parsable_Summable;

return new class extends Source_IntegerParser_TrivialSum_Parsable_Summable {

	public $entity = 'Keyword';

	public $fields = [
	    "EstimatedAddClicksAtFirstPositionCpc"
	];

	public $id = 'estimatedaddclicksatfirstpositioncpc';

	public $metric = 'estimatedaddclicksatfirstpositioncpc';

	public $platform = 'adwords';

	public $property = 'EstimatedAddClicksAtFirstPositionCpc';

	public $report = 'KEYWORDS_PERFORMANCE_REPORT';

	public $type = 'integer';
};
