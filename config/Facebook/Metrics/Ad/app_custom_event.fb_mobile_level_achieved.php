<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\Metric\Metric_ActionParser_TrivialSum_Parsable_Summable;

return new class extends Metric_ActionParser_TrivialSum_Parsable_Summable {

	public $actionsProperty = 'actions';

	public $actionType = 'app_custom_event.fb_mobile_level_achieved';

	public $entity = 'Ad';

	public $fields = [
	    "actions"
	];

	public $id = 'app_custom_event.fb_mobile_level_achieved';

	public $metric = 'app_custom_event.fb_mobile_level_achieved';

	public $platform = 'facebook';

	public $property = 'app_custom_event.fb_mobile_level_achieved';

	public $report = 'FB_AD';

	public $type = 'decimal';
};
