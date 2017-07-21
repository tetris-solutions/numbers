<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\AdWords\Source\CPV100Parser_CPV100Sum_Parsable_Summable;

return new class extends CPV100Parser_CPV100Sum_Parsable_Summable {
	public $id = "cpv100";
	public $metric = "cpv100";
	public $entity = "Keyword";
	public $platform = "adwords";
	public $report = "KEYWORDS_PERFORMANCE_REPORT";
	public $property = "Cpv100";
	public $type = "currency";
	public $costProperty = "Cost";
	public $views100PercentileProperty = "VideoQuartile100Rate";
	public $viewsProperty = "VideoViews";
	public $fields = ["Cost","VideoQuartile100Rate","VideoViews"];
	public $costMetric = "cost";
	public $views100PercentileMetric = "videoquartile100rate";
	public $viewsMetric = "videoviews";
	public $inferred_from = ["cost","videoquartile100rate","videoviews"];
};
