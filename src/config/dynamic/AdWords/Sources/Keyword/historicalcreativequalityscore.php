<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\AdWords\Source\RawParser_Parsable;

return new class extends RawParser_Parsable {
	public $id = "historicalcreativequalityscore";
	public $metric = "historicalcreativequalityscore";
	public $entity = "Keyword";
	public $platform = "adwords";
	public $report = "KEYWORDS_PERFORMANCE_REPORT";
	public $fields = ["HistoricalCreativeQualityScore"];
	public $property = "HistoricalCreativeQualityScore";
	public $type = "raw";
};
