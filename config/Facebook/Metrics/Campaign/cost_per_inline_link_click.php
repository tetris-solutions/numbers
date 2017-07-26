<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\Shared\Metric\Metric_FloatParser_RatioSum_Parsable_Summable;

return new class extends Metric_FloatParser_RatioSum_Parsable_Summable {

	public $dividendMetric = 'spend';

	public $divisorMetric = 'inline_link_clicks';

	public $entity = 'Campaign';

	public $fields = [
	    "cost_per_inline_link_click"
	];

	public $id = 'cost_per_inline_link_click';

	public $inferred_from = [
	    "spend",
	    "inline_link_clicks"
	];

	public $metric = 'cost_per_inline_link_click';

	public $platform = 'facebook';

	public $property = 'cost_per_inline_link_click';

	public $report = 'FB_CAMPAIGN';

	public $type = 'currency';
};
