<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\Shared\Metric\Metric_RawParser_Parsable;

return new class extends Metric_RawParser_Parsable {

	public $entity = 'Keyword';

	public $fields = [
	    "HistoricalSearchPredictedCtr"
	];

	public $id = 'historicalsearchpredictedctr';

	public $metric = 'historicalsearchpredictedctr';

	public $platform = 'adwords';

	public $property = 'HistoricalSearchPredictedCtr';

	public $report = 'KEYWORDS_PERFORMANCE_REPORT';

	public $type = 'qualityscorebucket';
};
