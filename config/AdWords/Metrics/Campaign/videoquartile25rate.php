<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\Metric\Metric_PercentParser_VideoQuartileSum_Parsable_Summable;

return new class extends Metric_PercentParser_VideoQuartileSum_Parsable_Summable {

	public $entity = 'Campaign';

	public $fields = [
	    "VideoQuartile25Rate"
	];

	public $id = 'videoquartile25rate';

	public $inferred_from = [
	    "videoviews"
	];

	public $metric = 'videoquartile25rate';

	public $platform = 'adwords';

	public $property = 'VideoQuartile25Rate';

	public $report = 'CAMPAIGN_PERFORMANCE_REPORT';

	public $type = 'percentage';

	public $videoQuartileMetric = 'videoquartile25rate';

	public $videoViewsMetric = 'videoviews';
};
