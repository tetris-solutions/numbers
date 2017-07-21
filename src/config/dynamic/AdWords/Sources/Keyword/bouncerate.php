<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\AdWords\Source\Source_PercentParser_Parsable;

return new class extends Source_PercentParser_Parsable {

	public $entity = 'Keyword';

	public $fields = [
	    "BounceRate"
	];

	public $id = 'bouncerate';

	public $metric = 'bouncerate';

	public $platform = 'adwords';

	public $property = 'BounceRate';

	public $report = 'KEYWORDS_PERFORMANCE_REPORT';

	public $type = 'percentage';
};
