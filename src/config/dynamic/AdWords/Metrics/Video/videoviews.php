<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\Metric\Metric_IntegerParser_TrivialSum_Parsable_Summable;

return new class extends Metric_IntegerParser_TrivialSum_Parsable_Summable {

	public $entity = 'Video';

	public $fields = [
	    "VideoViews"
	];

	public $id = 'videoviews';

	public $metric = 'videoviews';

	public $platform = 'adwords';

	public $property = 'VideoViews';

	public $report = 'VIDEO_PERFORMANCE_REPORT';

	public $type = 'integer';
};
