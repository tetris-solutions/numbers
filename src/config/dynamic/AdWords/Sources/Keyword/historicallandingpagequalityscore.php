<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\AdWords\Source\Source_RawParser_Parsable;

return new class extends Source_RawParser_Parsable {

	public $entity = 'Keyword';

	public $fields = [
	    "HistoricalLandingPageQualityScore"
	];

	public $id = 'historicallandingpagequalityscore';

	public $metric = 'historicallandingpagequalityscore';

	public $platform = 'adwords';

	public $property = 'HistoricalLandingPageQualityScore';

	public $report = 'KEYWORDS_PERFORMANCE_REPORT';

	public $type = 'raw';
};
