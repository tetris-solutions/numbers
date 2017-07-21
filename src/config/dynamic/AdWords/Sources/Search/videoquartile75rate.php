<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\AdWords\Source\PercentParser_VideoQuartileSum_Parsable_Summable;

return new class extends PercentParser_VideoQuartileSum_Parsable_Summable {
	public $id = "videoquartile75rate";
	public $metric = "videoquartile75rate";
	public $entity = "Search";
	public $platform = "adwords";
	public $report = "SEARCH_QUERY_PERFORMANCE_REPORT";
	public $fields = ["VideoQuartile75Rate"];
	public $property = "VideoQuartile75Rate";
	public $type = "percentage";
	public $videoViewsMetric = "videoviews";
	public $videoQuartileMetric = "videoquartile75rate";
	public $inferred_from = ["videoviews"];
};
