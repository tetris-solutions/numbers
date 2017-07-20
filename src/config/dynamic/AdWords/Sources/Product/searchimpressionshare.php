<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\AdWords\Source\AdWordsSourceComplexValueParserImpressionShareSumParsable;

return new class extends AdWordsSourceComplexValueParserImpressionShareSumParsable {
	public $id = "searchimpressionshare";
	public $metric = "searchimpressionshare";
	public $entity = "Product";
	public $platform = "adwords";
	public $report = "SHOPPING_PERFORMANCE_REPORT";
	public $property = "SearchImpressionShare";
	public $type = "special";
	public $fields = ["SearchImpressionShare"];
	public $impressionsMetric = "impressions";
	public $inferred_from = ["impressions"];
};
