<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\Metric\Metric_FloatParser_RatioSum_Parsable_Summable;

return new class extends Metric_FloatParser_RatioSum_Parsable_Summable {

	public $dividendMetric = 'spend';

	public $divisorMetric = 'total_actions';

	public $entity = 'AdSet';

	public $fields = [
	    "cost_per_total_action"
	];

	public $id = 'cost_per_total_action';

	public $inferred_from = [
	    "spend",
	    "total_actions"
	];

	public $metric = 'cost_per_total_action';

	public $platform = 'facebook';

	public $property = 'cost_per_total_action';

	public $report = 'FB_ADSET';

	public $type = 'currency';
};
