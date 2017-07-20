<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\AdWords\Source\AdWordsSourceComplexValueParserParsable;

return new class extends AdWordsSourceComplexValueParserParsable {
	public $id = "contentranklostimpressionshare";
	public $metric = "contentranklostimpressionshare";
	public $entity = "AdGroup";
	public $platform = "adwords";
	public $report = "ADGROUP_PERFORMANCE_REPORT";
	public $property = "ContentRankLostImpressionShare";
	public $type = "special";
	public $fields = ["ContentRankLostImpressionShare","ContentImpressionShare"];
	public $inferred_from = ["contentimpressionshare","impressions"];
};
