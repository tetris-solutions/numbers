<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\AdWords\Source\TriangulationParser_ImpressionShareSum_Parsable_Summable;

return new class extends TriangulationParser_ImpressionShareSum_Parsable_Summable {
	public $id = "searchimpressionshare";
	public $metric = "searchimpressionshare";
	public $entity = "Partition";
	public $platform = "adwords";
	public $report = "PRODUCT_PARTITION_REPORT";
	public $property = "SearchImpressionShare";
	public $type = "special";
	public $auxiliaryMetrics = [];
	public $fields = ["SearchImpressionShare"];
	public $impressionsMetric = "impressions";
	public $inferred_from = ["impressions"];
};
