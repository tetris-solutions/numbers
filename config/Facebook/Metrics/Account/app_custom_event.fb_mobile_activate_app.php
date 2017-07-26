<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\Shared\Metric\Metric_ActionParser_TrivialSum_Parsable_Summable;

return new class extends Metric_ActionParser_TrivialSum_Parsable_Summable {

	public $actionsProperty = 'actions';

	public $actionType = 'app_custom_event.fb_mobile_activate_app';

	public $entity = 'Account';

	public $fields = [
	    "actions"
	];

	public $id = 'app_custom_event.fb_mobile_activate_app';

	public $metric = 'app_custom_event.fb_mobile_activate_app';

	public $platform = 'facebook';

	public $property = 'app_custom_event.fb_mobile_activate_app';

	public $report = 'FB_ACCOUNT';

	public $type = 'decimal';
};
