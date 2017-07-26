<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\Shared\Metric\Metric_ActionParser_TrivialSum_Parsable_Summable;

return new class extends Metric_ActionParser_TrivialSum_Parsable_Summable {

	public $actionsProperty = 'actions';

	public $actionType = 'credit_spent';

	public $entity = 'Account';

	public $fields = [
	    "actions"
	];

	public $id = 'credit_spent';

	public $metric = 'credit_spent';

	public $platform = 'facebook';

	public $property = 'credit_spent';

	public $report = 'FB_ACCOUNT';

	public $type = 'decimal';
};
