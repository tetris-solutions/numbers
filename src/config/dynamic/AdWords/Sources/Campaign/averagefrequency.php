<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\AdWords\Source\FloatParser_RatioSum_Parsable_Summable;

return new class extends FloatParser_RatioSum_Parsable_Summable {
	public $id = "averagefrequency";
	public $metric = "averagefrequency";
	public $entity = "Campaign";
	public $platform = "adwords";
	public $report = "CAMPAIGN_PERFORMANCE_REPORT";
	public $fields = ["AverageFrequency"];
	public $property = "AverageFrequency";
	public $type = "decimal";
	public $dividendMetric = "impressions";
	public $divisorMetric = "impressionreach";
	public $inferred_from = ["impressions","impressionreach"];
};
