<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\Shared\Metric\Metric_FloatParser_TrivialSum_Parsable_Summable;

return new class extends Metric_FloatParser_TrivialSum_Parsable_Summable {

	public $entity = 'AdSet';

	public $fields = [
	    "total_action_value"
	];

	public $id = 'total_action_value';

	public $metric = 'total_action_value';

	public $platform = 'facebook';

	public $property = 'total_action_value';

	public $report = 'FB_ADSET';

	public $type = 'decimal';
};
