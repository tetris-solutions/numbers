<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\AdWords\Source\Source_FloatParser_TrivialSum_Parsable_Summable;

return new class extends Source_FloatParser_TrivialSum_Parsable_Summable {

	public $entity = 'Keyword';

	public $fields = [
	    "AveragePageviews"
	];

	public $id = 'averagepageviews';

	public $metric = 'averagepageviews';

	public $platform = 'adwords';

	public $property = 'AveragePageviews';

	public $report = 'KEYWORDS_PERFORMANCE_REPORT';

	public $type = 'decimal';
};
