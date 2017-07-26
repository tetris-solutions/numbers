<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\Shared\Metric\Metric_FloatParser_TrivialSum_Parsable_Summable;

return new class extends Metric_FloatParser_TrivialSum_Parsable_Summable {

	public $entity = 'Campaign';

	public $fields = [
	    "call_to_action_clicks"
	];

	public $id = 'call_to_action_clicks';

	public $metric = 'call_to_action_clicks';

	public $platform = 'facebook';

	public $property = 'call_to_action_clicks';

	public $report = 'FB_CAMPAIGN';

	public $type = 'decimal';
};
