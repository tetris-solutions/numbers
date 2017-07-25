<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\Source\Source_PercentParser_RatioSum_Parsable_Summable;

return new class extends Source_PercentParser_RatioSum_Parsable_Summable {

	public $dividendMetric = 'videoviews';

	public $divisorMetric = 'impressions';

	public $entity = 'Location';

	public $fields = [
	    "VideoViewRate"
	];

	public $id = 'videoviewrate';

	public $inferred_from = [
	    "videoviews",
	    "impressions"
	];

	public $metric = 'videoviewrate';

	public $platform = 'adwords';

	public $property = 'VideoViewRate';

	public $report = 'GEO_PERFORMANCE_REPORT';

	public $type = 'percentage';
};
