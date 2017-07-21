<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\AdWords\Source\RawParser_Parsable;

return new class extends RawParser_Parsable {
	public $id = "historicalsearchpredictedctr";
	public $metric = "historicalsearchpredictedctr";
	public $entity = "Keyword";
	public $platform = "adwords";
	public $report = "KEYWORDS_PERFORMANCE_REPORT";
	public $fields = ["HistoricalSearchPredictedCtr"];
	public $property = "HistoricalSearchPredictedCtr";
	public $type = "raw";
};
