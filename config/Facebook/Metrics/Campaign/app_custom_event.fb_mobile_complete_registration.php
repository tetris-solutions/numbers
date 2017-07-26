<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\Shared\Metric\Metric_ActionParser_TrivialSum_Parsable_Summable;

return new class extends Metric_ActionParser_TrivialSum_Parsable_Summable {

	public $actionsProperty = 'actions';

	public $actionType = 'app_custom_event.fb_mobile_complete_registration';

	public $entity = 'Campaign';

	public $fields = [
	    "actions"
	];

	public $id = 'app_custom_event.fb_mobile_complete_registration';

	public $metric = 'app_custom_event.fb_mobile_complete_registration';

	public $platform = 'facebook';

	public $property = 'app_custom_event.fb_mobile_complete_registration';

	public $report = 'FB_CAMPAIGN';

	public $type = 'decimal';
};
