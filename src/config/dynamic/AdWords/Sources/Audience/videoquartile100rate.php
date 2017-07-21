<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\AdWords\Source\Source_PercentParser_VideoQuartileSum_Parsable_Summable;

return new class extends Source_PercentParser_VideoQuartileSum_Parsable_Summable {
	public $id = "videoquartile100rate";
	public $metric = "videoquartile100rate";
	public $entity = "Audience";
	public $platform = "adwords";
	public $report = "AUDIENCE_PERFORMANCE_REPORT";
	public $fields = ["VideoQuartile100Rate"];
	public $property = "VideoQuartile100Rate";
	public $type = "percentage";
	public $videoViewsMetric = "videoviews";
	public $videoQuartileMetric = "videoquartile100rate";
	public $inferred_from = ["videoviews"];
};
