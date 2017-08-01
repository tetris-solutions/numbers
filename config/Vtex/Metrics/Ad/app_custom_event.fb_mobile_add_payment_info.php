<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\Metric\Metric_ActionParser_TrivialSum_Parsable_Summable;

return new class extends Metric_ActionParser_TrivialSum_Parsable_Summable {

	public $actionsProperty = 'actions';

	public $actionType = 'app_custom_event.fb_mobile_add_payment_info';

	public $entity = 'Ad';

	public $fields = [
	    "actions"
	];

	public $id = 'app_custom_event.fb_mobile_add_payment_info';

	public $metric = 'app_custom_event.fb_mobile_add_payment_info';

	public $platform = 'facebook';

	public $property = 'app_custom_event.fb_mobile_add_payment_info';

	public $report = 'FB_AD';

	public $type = 'decimal';
};
