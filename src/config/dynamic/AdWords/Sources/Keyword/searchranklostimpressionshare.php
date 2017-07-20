<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\AdWords\Source\AdWordsSourceComplexValueParserParsable;

return new class extends AdWordsSourceComplexValueParserParsable {
	public $id = "searchranklostimpressionshare";
	public $metric = "searchranklostimpressionshare";
	public $entity = "Keyword";
	public $platform = "adwords";
	public $report = "KEYWORDS_PERFORMANCE_REPORT";
	public $property = "SearchRankLostImpressionShare";
	public $type = "special";
	public $fields = ["SearchRankLostImpressionShare","SearchImpressionShare"];
	public $inferred_from = ["searchimpressionshare","impressions"];
};
