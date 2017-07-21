<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\AdWords\Source\Source_PercentParser_VideoQuartileSum_Parsable_Summable;

return new class extends Source_PercentParser_VideoQuartileSum_Parsable_Summable {
	public $id = "videoquartile75rate";
	public $metric = "videoquartile75rate";
	public $entity = "Ad";
	public $platform = "adwords";
	public $report = "AD_PERFORMANCE_REPORT";
	public $fields = ["VideoQuartile75Rate"];
	public $property = "VideoQuartile75Rate";
	public $type = "percentage";
	public $videoViewsMetric = "videoviews";
	public $videoQuartileMetric = "videoquartile75rate";
	public $inferred_from = ["videoviews"];
};
