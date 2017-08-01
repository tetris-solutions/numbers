<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\Metric\Metric_ActionParser_TrivialSum_Parsable_Summable;

return new class extends Metric_ActionParser_TrivialSum_Parsable_Summable {

	public $actionsProperty = 'actions';

	public $actionType = 'app_custom_event.other';

	public $entity = 'Account';

	public $fields = [
	    "actions"
	];

	public $id = 'app_custom_event.other';

	public $metric = 'app_custom_event.other';

	public $platform = 'facebook';

	public $property = 'app_custom_event.other';

	public $report = 'FB_ACCOUNT';

	public $type = 'decimal';
};
