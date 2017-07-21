<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\AdWords\Source\Source_FloatParser_RatioSum_Parsable_Summable;

return new class extends Source_FloatParser_RatioSum_Parsable_Summable {
	public $id = "averagecpv";
	public $metric = "averagecpv";
	public $entity = "Keyword";
	public $platform = "adwords";
	public $report = "KEYWORDS_PERFORMANCE_REPORT";
	public $fields = ["AverageCpv"];
	public $property = "AverageCpv";
	public $type = "currency";
	public $dividendMetric = "cost";
	public $divisorMetric = "videoviews";
	public $inferred_from = ["cost","videoviews"];
};
