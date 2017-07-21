<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\AdWords\Source\Source_FloatParser_RatioSum_Parsable_Summable;

return new class extends Source_FloatParser_RatioSum_Parsable_Summable {
	public $id = "averagecpe";
	public $metric = "averagecpe";
	public $entity = "Keyword";
	public $platform = "adwords";
	public $report = "KEYWORDS_PERFORMANCE_REPORT";
	public $fields = ["AverageCpe"];
	public $property = "AverageCpe";
	public $type = "currency";
	public $dividendMetric = "cost";
	public $divisorMetric = "engagements";
	public $inferred_from = ["cost","engagements"];
};
