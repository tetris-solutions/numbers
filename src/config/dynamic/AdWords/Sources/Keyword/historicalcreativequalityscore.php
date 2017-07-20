<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\AdWords\Source\AdWordsSourceRawParserParsable;

return new class extends AdWordsSourceRawParserParsable {
	public $id = "historicalcreativequalityscore";
	public $metric = "historicalcreativequalityscore";
	public $entity = "Keyword";
	public $platform = "adwords";
	public $report = "KEYWORDS_PERFORMANCE_REPORT";
	public $fields = ["HistoricalCreativeQualityScore"];
	public $property = "HistoricalCreativeQualityScore";
	public $type = "raw";
};
