<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\AdWords\Source\Source_RawParser_Parsable;

return new class extends Source_RawParser_Parsable {
	public $id = "historicallandingpagequalityscore";
	public $metric = "historicallandingpagequalityscore";
	public $entity = "Keyword";
	public $platform = "adwords";
	public $report = "KEYWORDS_PERFORMANCE_REPORT";
	public $fields = ["HistoricalLandingPageQualityScore"];
	public $property = "HistoricalLandingPageQualityScore";
	public $type = "raw";
};
