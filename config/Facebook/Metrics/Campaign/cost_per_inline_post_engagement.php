<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\Shared\Metric\Metric_FloatParser_RatioSum_Parsable_Summable;

return new class extends Metric_FloatParser_RatioSum_Parsable_Summable {

	public $dividendMetric = 'spend';

	public $divisorMetric = 'inline_post_engagement';

	public $entity = 'Campaign';

	public $fields = [
	    "cost_per_inline_post_engagement"
	];

	public $id = 'cost_per_inline_post_engagement';

	public $inferred_from = [
	    "spend",
	    "inline_post_engagement"
	];

	public $metric = 'cost_per_inline_post_engagement';

	public $platform = 'facebook';

	public $property = 'cost_per_inline_post_engagement';

	public $report = 'FB_CAMPAIGN';

	public $type = 'currency';
};
