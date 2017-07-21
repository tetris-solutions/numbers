<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\AdWords\Source\PercentParser_VideoQuartileSum_Parsable_Summable;

return new class extends PercentParser_VideoQuartileSum_Parsable_Summable {
	public $id = "videoquartile50rate";
	public $metric = "videoquartile50rate";
	public $entity = "Search";
	public $platform = "adwords";
	public $report = "SEARCH_QUERY_PERFORMANCE_REPORT";
	public $fields = ["VideoQuartile50Rate"];
	public $property = "VideoQuartile50Rate";
	public $type = "percentage";
	public $videoViewsMetric = "videoviews";
	public $videoQuartileMetric = "videoquartile50rate";
	public $inferred_from = ["videoviews"];
};
