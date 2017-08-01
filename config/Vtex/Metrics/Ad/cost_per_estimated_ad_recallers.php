<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\Metric\Metric_FloatParser_RatioSum_Parsable_Summable;

return new class extends Metric_FloatParser_RatioSum_Parsable_Summable {

	public $dividendMetric = 'spend';

	public $divisorMetric = 'estimated_ad_recallers';

	public $entity = 'Ad';

	public $fields = [
	    "cost_per_estimated_ad_recallers"
	];

	public $id = 'cost_per_estimated_ad_recallers';

	public $inferred_from = [
	    "spend",
	    "estimated_ad_recallers"
	];

	public $metric = 'cost_per_estimated_ad_recallers';

	public $platform = 'facebook';

	public $property = 'cost_per_estimated_ad_recallers';

	public $report = 'FB_AD';

	public $type = 'currency';
};
