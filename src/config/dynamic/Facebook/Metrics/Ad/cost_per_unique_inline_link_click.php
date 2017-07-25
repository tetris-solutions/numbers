<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\Metric\Metric_FloatParser_Parsable;

return new class extends Metric_FloatParser_Parsable {

	public $entity = 'Ad';

	public $fields = [
	    "cost_per_unique_inline_link_click"
	];

	public $id = 'cost_per_unique_inline_link_click';

	public $metric = 'cost_per_unique_inline_link_click';

	public $platform = 'facebook';

	public $property = 'cost_per_unique_inline_link_click';

	public $report = 'FB_AD';

	public $type = 'currency';
};
