<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\Source\Source_PercentParser_VideoQuartileSum_Parsable_Summable;

return new class extends Source_PercentParser_VideoQuartileSum_Parsable_Summable {

	public $entity = 'Audience';

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

	public $report = 'AUDIENCE_PERFORMANCE_REPORT';

	public $type = 'percentage';

	public $videoQuartileMetric = 'videoquartile50rate';

	public $videoViewsMetric = 'videoviews';
};
