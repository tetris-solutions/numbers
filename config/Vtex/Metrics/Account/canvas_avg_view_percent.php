<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\Metric\Metric_FloatParser_TrivialSum_Parsable_Summable;

return new class extends Metric_FloatParser_TrivialSum_Parsable_Summable {

	public $entity = 'Account';

	public $fields = [
	    "canvas_avg_view_percent"
	];

	public $id = 'canvas_avg_view_percent';

	public $metric = 'canvas_avg_view_percent';

	public $platform = 'facebook';

	public $property = 'canvas_avg_view_percent';

	public $report = 'FB_ACCOUNT';

	public $type = 'decimal';
};
