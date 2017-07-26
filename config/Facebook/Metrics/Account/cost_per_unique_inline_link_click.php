<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\Shared\Metric\Metric_FloatParser_Parsable;

return new class extends Metric_FloatParser_Parsable {

	public $entity = 'Account';

	public $fields = [
	    "cost_per_unique_inline_link_click"
	];

	public $id = 'cost_per_unique_inline_link_click';

	public $metric = 'cost_per_unique_inline_link_click';

	public $platform = 'facebook';

	public $property = 'cost_per_unique_inline_link_click';

	public $report = 'FB_ACCOUNT';

	public $type = 'currency';
};
