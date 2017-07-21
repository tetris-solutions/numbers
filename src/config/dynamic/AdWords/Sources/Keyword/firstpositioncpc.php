<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\AdWords\Source\Source_FloatParser_Parsable;

return new class extends Source_FloatParser_Parsable {

	public $entity = 'Keyword';

	public $fields = [
	    "FirstPositionCpc"
	];

	public $id = 'firstpositioncpc';

	public $metric = 'firstpositioncpc';

	public $platform = 'adwords';

	public $property = 'FirstPositionCpc';

	public $report = 'KEYWORDS_PERFORMANCE_REPORT';

	public $type = 'currency';
};
