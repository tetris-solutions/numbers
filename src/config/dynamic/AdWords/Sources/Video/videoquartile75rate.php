<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\AdWords\Source\Source_PercentParser_VideoQuartileSum_Parsable_Summable;

return new class extends Source_PercentParser_VideoQuartileSum_Parsable_Summable {

	public $entity = 'Video';

	public $fields = [
	    "VideoQuartile75Rate"
	];

	public $id = 'videoquartile75rate';

	public $inferred_from = [
	    "videoviews"
	];

	public $metric = 'videoquartile75rate';

	public $platform = 'adwords';

	public $property = 'VideoQuartile75Rate';

	public $report = 'VIDEO_PERFORMANCE_REPORT';

	public $type = 'percentage';

	public $videoQuartileMetric = 'videoquartile75rate';

	public $videoViewsMetric = 'videoviews';
};
