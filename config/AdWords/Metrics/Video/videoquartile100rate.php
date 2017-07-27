<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\Metric\Metric_PercentParser_VideoQuartileSum_Parsable_Summable;

return new class extends Metric_PercentParser_VideoQuartileSum_Parsable_Summable {

	public $entity = 'Video';

	public $fields = [
	    "VideoQuartile100Rate"
	];

	public $id = 'videoquartile100rate';

	public $inferred_from = [
	    "videoviews"
	];

	public $metric = 'videoquartile100rate';

	public $platform = 'adwords';

	public $property = 'VideoQuartile100Rate';

	public $report = 'VIDEO_PERFORMANCE_REPORT';

	public $type = 'percentage';

	public $videoQuartileMetric = 'videoquartile100rate';

	public $videoViewsMetric = 'videoviews';
};
