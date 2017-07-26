<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\Shared\Metric\Metric_ActionParser_TrivialSum_Parsable_Summable;

return new class extends Metric_ActionParser_TrivialSum_Parsable_Summable {

	public $actionsProperty = 'actions';

	public $actionType = 'comment';

	public $entity = 'Campaign';

	public $fields = [
	    "actions"
	];

	public $id = 'comment';

	public $metric = 'comment';

	public $platform = 'facebook';

	public $property = 'comment';

	public $report = 'FB_CAMPAIGN';

	public $type = 'decimal';
};
