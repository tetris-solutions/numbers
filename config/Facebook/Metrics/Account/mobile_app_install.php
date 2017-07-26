<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\Shared\Metric\Metric_ActionParser_TrivialSum_Parsable_Summable;

return new class extends Metric_ActionParser_TrivialSum_Parsable_Summable {

	public $actionsProperty = 'actions';

	public $actionType = 'mobile_app_install';

	public $entity = 'Account';

	public $fields = [
	    "actions"
	];

	public $id = 'mobile_app_install';

	public $metric = 'mobile_app_install';

	public $platform = 'facebook';

	public $property = 'mobile_app_install';

	public $report = 'FB_ACCOUNT';

	public $type = 'decimal';
};
