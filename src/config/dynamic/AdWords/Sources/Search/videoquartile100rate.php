<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\AdWords\Source\Source_PercentParser_VideoQuartileSum_Parsable_Summable;

return new class extends Source_PercentParser_VideoQuartileSum_Parsable_Summable {

	public $entity = 'Search';

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

	public $report = 'SEARCH_QUERY_PERFORMANCE_REPORT';

	public $type = 'percentage';

	public $videoQuartileMetric = 'videoquartile100rate';

	public $videoViewsMetric = 'videoviews';
};
