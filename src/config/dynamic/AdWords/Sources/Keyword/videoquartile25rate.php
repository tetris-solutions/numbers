<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\AdWords\Source\Source_PercentParser_VideoQuartileSum_Parsable_Summable;

return new class extends Source_PercentParser_VideoQuartileSum_Parsable_Summable {

	public $entity = 'Keyword';

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

	public $report = 'KEYWORDS_PERFORMANCE_REPORT';

	public $type = 'percentage';

	public $videoQuartileMetric = 'videoquartile25rate';

	public $videoViewsMetric = 'videoviews';
};
