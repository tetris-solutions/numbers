<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\Shared\Metric\Metric_PercentParser_VideoQuartileSum_Parsable_Summable;

return new class extends Metric_PercentParser_VideoQuartileSum_Parsable_Summable {

	public $entity = 'Campaign';

	public $fields = [
	    "VideoQuartile50Rate"
	];

	public $id = 'videoquartile50rate';

	public $inferred_from = [
	    "videoviews"
	];

	public $metric = 'videoquartile50rate';

	public $platform = 'adwords';

	public $property = 'VideoQuartile50Rate';

	public $report = 'CAMPAIGN_PERFORMANCE_REPORT';

	public $type = 'percentage';

	public $videoQuartileMetric = 'videoquartile50rate';

	public $videoViewsMetric = 'videoviews';
};
