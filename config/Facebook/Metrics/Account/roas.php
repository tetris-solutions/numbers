<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\Metric\Metric_RatioParser_RatioSum_Parsable_Summable;

return new class extends Metric_RatioParser_RatioSum_Parsable_Summable {

	public $dividendMetric = 'total_action_value';

	public $dividendProperty = 'total_action_value';

	public $divisorMetric = 'spend';

	public $divisorProperty = 'spend';

	public $entity = 'Account';

	public $fields = [
	    "total_action_value",
	    "spend"
	];

	public $id = 'roas';

	public $inferred_from = [
	    "total_action_value",
	    "spend"
	];

	public $metric = 'roas';

	public $platform = 'facebook';

	public $property = 'roas';

	public $report = 'FB_ACCOUNT';

	public $type = 'currency';
};
