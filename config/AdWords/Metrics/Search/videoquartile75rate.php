<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\Shared\Metric\Metric_PercentParser_VideoQuartileSum_Parsable_Summable;

return new class extends Metric_PercentParser_VideoQuartileSum_Parsable_Summable {

	public $entity = 'Search';

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

	public $report = 'SEARCH_QUERY_PERFORMANCE_REPORT';

	public $type = 'percentage';

	public $videoQuartileMetric = 'videoquartile75rate';

	public $videoViewsMetric = 'videoviews';
};
