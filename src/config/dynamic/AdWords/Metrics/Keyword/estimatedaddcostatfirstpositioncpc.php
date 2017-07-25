<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\Metric\Metric_FloatParser_Parsable;

return new class extends Metric_FloatParser_Parsable {

	public $entity = 'Keyword';

	public $fields = [
	    "EstimatedAddCostAtFirstPositionCpc"
	];

	public $id = 'estimatedaddcostatfirstpositioncpc';

	public $metric = 'estimatedaddcostatfirstpositioncpc';

	public $platform = 'adwords';

	public $property = 'EstimatedAddCostAtFirstPositionCpc';

	public $report = 'KEYWORDS_PERFORMANCE_REPORT';

	public $type = 'currency';
};
