<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\AdWords\Source\Source_IntegerParser_TrivialSum_Parsable_Summable;

return new class extends Source_IntegerParser_TrivialSum_Parsable_Summable {

	public $entity = 'Keyword';

	public $fields = [
	    "HistoricalQualityScore"
	];

	public $id = 'historicalqualityscore';

	public $metric = 'historicalqualityscore';

	public $platform = 'adwords';

	public $property = 'HistoricalQualityScore';

	public $report = 'KEYWORDS_PERFORMANCE_REPORT';

	public $type = 'integer';
};
