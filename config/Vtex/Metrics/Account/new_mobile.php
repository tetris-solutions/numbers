<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\Metric\Metric_ActionParser_TrivialSum_Parsable_Summable;

return new class extends Metric_ActionParser_TrivialSum_Parsable_Summable {

	public $actionsProperty = 'actions';

	public $actionType = 'new_mobile';

	public $entity = 'Account';

	public $fields = [
	    "actions"
	];

	public $id = 'new_mobile';

	public $metric = 'new_mobile';

	public $platform = 'facebook';

	public $property = 'new_mobile';

	public $report = 'FB_ACCOUNT';

	public $type = 'decimal';
};
