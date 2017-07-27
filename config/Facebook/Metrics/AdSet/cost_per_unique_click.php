<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\Metric\Metric_FloatParser_Parsable;

return new class extends Metric_FloatParser_Parsable {

	public $entity = 'AdSet';

	public $fields = [
	    "cost_per_unique_click"
	];

	public $id = 'cost_per_unique_click';

	public $metric = 'cost_per_unique_click';

	public $platform = 'facebook';

	public $property = 'cost_per_unique_click';

	public $report = 'FB_ADSET';

	public $type = 'currency';
};
