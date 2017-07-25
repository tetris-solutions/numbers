<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\Source\Source_PercentParser_VideoQuartileSum_Parsable_Summable;

return new class extends Source_PercentParser_VideoQuartileSum_Parsable_Summable {

	public $entity = 'AdGroup';

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

	public $report = 'ADGROUP_PERFORMANCE_REPORT';

	public $type = 'percentage';

	public $videoQuartileMetric = 'videoquartile75rate';

	public $videoViewsMetric = 'videoviews';
};
