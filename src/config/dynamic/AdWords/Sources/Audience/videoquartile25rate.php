<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\AdWords\Source\Source_PercentParser_VideoQuartileSum_Parsable_Summable;

return new class extends Source_PercentParser_VideoQuartileSum_Parsable_Summable {
	public $id = "videoquartile25rate";
	public $metric = "videoquartile25rate";
	public $entity = "Audience";
	public $platform = "adwords";
	public $report = "AUDIENCE_PERFORMANCE_REPORT";
	public $fields = ["VideoQuartile25Rate"];
	public $property = "VideoQuartile25Rate";
	public $type = "percentage";
	public $videoViewsMetric = "videoviews";
	public $videoQuartileMetric = "videoquartile25rate";
	public $inferred_from = ["videoviews"];
};
