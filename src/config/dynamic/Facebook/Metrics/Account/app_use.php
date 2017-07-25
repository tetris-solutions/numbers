<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\Metric\Metric_ActionParser_TrivialSum_Parsable_Summable;

return new class extends Metric_ActionParser_TrivialSum_Parsable_Summable {

	public $actionsProperty = 'actions';

	public $actionType = 'app_use';

	public $entity = 'Account';

	public $fields = [
	    "actions"
	];

	public $id = 'app_use';

	public $metric = 'app_use';

	public $platform = 'facebook';

	public $property = 'app_use';

	public $report = 'FB_ACCOUNT';

	public $type = 'decimal';
};
