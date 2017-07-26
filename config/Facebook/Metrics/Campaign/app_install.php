<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\Shared\Metric\Metric_ActionParser_TrivialSum_Parsable_Summable;

return new class extends Metric_ActionParser_TrivialSum_Parsable_Summable {

	public $actionsProperty = 'actions';

	public $actionType = 'app_install';

	public $entity = 'Campaign';

	public $fields = [
	    "actions"
	];

	public $id = 'app_install';

	public $metric = 'app_install';

	public $platform = 'facebook';

	public $property = 'app_install';

	public $report = 'FB_CAMPAIGN';

	public $type = 'decimal';
};
