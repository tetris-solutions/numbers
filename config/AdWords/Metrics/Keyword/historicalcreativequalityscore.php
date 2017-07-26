<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\Shared\Metric\Metric_RawParser_Parsable;

return new class extends Metric_RawParser_Parsable {

	public $entity = 'Keyword';

	public $fields = [
	    "HistoricalCreativeQualityScore"
	];

	public $id = 'historicalcreativequalityscore';

	public $metric = 'historicalcreativequalityscore';

	public $platform = 'adwords';

	public $property = 'HistoricalCreativeQualityScore';

	public $report = 'KEYWORDS_PERFORMANCE_REPORT';

	public $type = 'qualityscorebucket';
};
