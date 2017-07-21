<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\AdWords\Source\PercentParser_VideoQuartileSum_Parsable_Summable;

return new class extends PercentParser_VideoQuartileSum_Parsable_Summable {
	public $id = "videoquartile100rate";
	public $metric = "videoquartile100rate";
	public $entity = "Search";
	public $platform = "adwords";
	public $report = "SEARCH_QUERY_PERFORMANCE_REPORT";
	public $fields = ["VideoQuartile100Rate"];
	public $property = "VideoQuartile100Rate";
	public $type = "percentage";
	public $videoViewsMetric = "videoviews";
	public $videoQuartileMetric = "videoquartile100rate";
	public $inferred_from = ["videoviews"];
};
