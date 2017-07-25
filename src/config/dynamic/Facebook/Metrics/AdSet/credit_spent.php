<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\Metric\Metric_ActionParser_TrivialSum_Parsable_Summable;

return new class extends Metric_ActionParser_TrivialSum_Parsable_Summable {

	public $actionsProperty = 'actions';

	public $actionType = 'credit_spent';

	public $entity = 'AdSet';

	public $fields = [
	    "actions"
	];

	public $id = 'credit_spent';

	public $metric = 'credit_spent';

	public $platform = 'facebook';

	public $property = 'credit_spent';

	public $report = 'FB_ADSET';

	public $type = 'decimal';
};
