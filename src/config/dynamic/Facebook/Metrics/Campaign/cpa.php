<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\Metric\Metric_RatioParser_RatioSum_Parsable_Summable;

return new class extends Metric_RatioParser_RatioSum_Parsable_Summable {

	public $dividendMetric = 'total_actions';

	public $dividendProperty = 'total_actions';

	public $divisorMetric = 'total_action_value';

	public $divisorProperty = 'total_action_value';

	public $entity = 'Campaign';

	public $fields = [
	    "total_actions",
	    "total_action_value"
	];

	public $id = 'cpa';

	public $inferred_from = [
	    "total_actions",
	    "total_action_value"
	];

	public $metric = 'cpa';

	public $platform = 'facebook';

	public $property = 'cpa';

	public $report = 'FB_CAMPAIGN';

	public $type = 'currency';
};
