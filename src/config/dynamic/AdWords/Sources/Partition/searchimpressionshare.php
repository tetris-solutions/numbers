<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\AdWords\Source\AdWordsSourceComplexValueParserImpressionShareSumParsable;

return new class extends AdWordsSourceComplexValueParserImpressionShareSumParsable {
	public $id = "searchimpressionshare";
	public $metric = "searchimpressionshare";
	public $entity = "Partition";
	public $platform = "adwords";
	public $report = "PRODUCT_PARTITION_REPORT";
	public $property = "SearchImpressionShare";
	public $type = "special";
	public $fields = ["SearchImpressionShare"];
	public $impressionsMetric = "impressions";
	public $inferred_from = ["impressions"];
};
