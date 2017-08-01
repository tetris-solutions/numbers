<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\Metric\Metric_ActionParser_TrivialSum_Parsable_Summable;

return new class extends Metric_ActionParser_TrivialSum_Parsable_Summable {

	public $actionsProperty = 'actions';

	public $actionType = 'like';

	public $entity = 'Account';

	public $fields = [
	    "actions"
	];

	public $id = 'like';

	public $metric = 'like';

	public $platform = 'facebook';

	public $property = 'like';

	public $report = 'FB_ACCOUNT';

	public $type = 'decimal';
};
