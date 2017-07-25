<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\Metric\Metric_FloatParser_TrivialSum_Parsable_Summable;

return new class extends Metric_FloatParser_TrivialSum_Parsable_Summable {

	public $entity = 'Ad';

	public $fields = [
	    "canvas_avg_view_time"
	];

	public $id = 'canvas_avg_view_time';

	public $metric = 'canvas_avg_view_time';

	public $platform = 'facebook';

	public $property = 'canvas_avg_view_time';

	public $report = 'FB_AD';

	public $type = 'decimal';
};
