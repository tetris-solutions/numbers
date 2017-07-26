<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\Shared\Metric\Metric_ActionParser_TrivialSum_Parsable_Summable;

return new class extends Metric_ActionParser_TrivialSum_Parsable_Summable {

	public $actionsProperty = 'actions';

	public $actionType = 'post';

	public $entity = 'Campaign';

	public $fields = [
	    "actions"
	];

	public $id = 'post';

	public $metric = 'post';

	public $platform = 'facebook';

	public $property = 'post';

	public $report = 'FB_CAMPAIGN';

	public $type = 'decimal';
};
