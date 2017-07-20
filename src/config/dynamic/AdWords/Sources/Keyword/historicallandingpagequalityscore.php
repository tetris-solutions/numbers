<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\AdWords\Source\AdWordsSourceRawParserParsable;

return new class extends AdWordsSourceRawParserParsable {
	public $id = "historicallandingpagequalityscore";
	public $metric = "historicallandingpagequalityscore";
	public $entity = "Keyword";
	public $platform = "adwords";
	public $report = "KEYWORDS_PERFORMANCE_REPORT";
	public $fields = ["HistoricalLandingPageQualityScore"];
	public $property = "HistoricalLandingPageQualityScore";
	public $type = "raw";
};
