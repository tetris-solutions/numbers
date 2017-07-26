<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\Shared\Metric\Metric_PercentParser_VideoQuartileSum_Parsable_Summable;

return new class extends Metric_PercentParser_VideoQuartileSum_Parsable_Summable {

	public $entity = 'Audience';

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

	public $report = 'AUDIENCE_PERFORMANCE_REPORT';

	public $type = 'percentage';

	public $videoQuartileMetric = 'videoquartile25rate';

	public $videoViewsMetric = 'videoviews';
};
