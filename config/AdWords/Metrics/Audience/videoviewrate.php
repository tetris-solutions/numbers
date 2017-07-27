<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\Metric\Metric_PercentParser_RatioSum_Parsable_Summable;

return new class extends Metric_PercentParser_RatioSum_Parsable_Summable {

	public $dividendMetric = 'videoviews';

	public $divisorMetric = 'impressions';

	public $entity = 'Audience';

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

	public $report = 'AUDIENCE_PERFORMANCE_REPORT';

	public $type = 'percentage';
};
