<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\Shared\Metric\Metric_ActionParser_TrivialSum_Parsable_Summable;

return new class extends Metric_ActionParser_TrivialSum_Parsable_Summable {

	public $actionsProperty = 'actions';

	public $actionType = 'mention';

	public $entity = 'Account';

	public $fields = [
	    "actions"
	];

	public $id = 'mention';

	public $metric = 'mention';

	public $platform = 'facebook';

	public $property = 'mention';

	public $report = 'FB_ACCOUNT';

	public $type = 'decimal';
};
