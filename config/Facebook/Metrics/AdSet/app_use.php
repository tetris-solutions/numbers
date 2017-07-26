<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\Shared\Metric\Metric_ActionParser_TrivialSum_Parsable_Summable;

return new class extends Metric_ActionParser_TrivialSum_Parsable_Summable {

	public $actionsProperty = 'actions';

	public $actionType = 'app_use';

	public $entity = 'AdSet';

	public $fields = [
	    "actions"
	];

	public $id = 'app_use';

	public $metric = 'app_use';

	public $platform = 'facebook';

	public $property = 'app_use';

	public $report = 'FB_ADSET';

	public $type = 'decimal';
};
