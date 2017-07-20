<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\AdWords\Source\AdWordsSourceComplexValueParserParsable;

return new class extends AdWordsSourceComplexValueParserParsable {
	public $id = "searchexactmatchimpressionshare";
	public $metric = "searchexactmatchimpressionshare";
	public $entity = "Keyword";
	public $platform = "adwords";
	public $report = "KEYWORDS_PERFORMANCE_REPORT";
	public $fields = ["SearchExactMatchImpressionShare"];
	public $property = "SearchExactMatchImpressionShare";
	public $type = "special";
};
