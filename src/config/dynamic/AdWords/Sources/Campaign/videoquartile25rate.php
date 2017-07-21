<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\AdWords\Source\PercentParser_VideoQuartileSum_Parsable_Summable;

return new class extends PercentParser_VideoQuartileSum_Parsable_Summable {
	public $id = "videoquartile25rate";
	public $metric = "videoquartile25rate";
	public $entity = "Campaign";
	public $platform = "adwords";
	public $report = "CAMPAIGN_PERFORMANCE_REPORT";
	public $fields = ["VideoQuartile25Rate"];
	public $property = "VideoQuartile25Rate";
	public $type = "percentage";
	public $videoViewsMetric = "videoviews";
	public $videoQuartileMetric = "videoquartile25rate";
	public $inferred_from = ["videoviews"];
};
