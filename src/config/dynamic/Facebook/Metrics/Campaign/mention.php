<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\Metric\Metric_ActionParser_TrivialSum_Parsable_Summable;

return new class extends Metric_ActionParser_TrivialSum_Parsable_Summable {

	public $actionsProperty = 'actions';

	public $actionType = 'mention';

	public $entity = 'Campaign';

	public $fields = [
	    "actions"
	];

	public $id = 'mention';

	public $metric = 'mention';

	public $platform = 'facebook';

	public $property = 'mention';

	public $report = 'FB_CAMPAIGN';

	public $type = 'decimal';
};
