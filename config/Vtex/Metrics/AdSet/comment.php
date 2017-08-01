<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\Metric\Metric_ActionParser_TrivialSum_Parsable_Summable;

return new class extends Metric_ActionParser_TrivialSum_Parsable_Summable {

	public $actionsProperty = 'actions';

	public $actionType = 'comment';

	public $entity = 'AdSet';

	public $fields = [
	    "actions"
	];

	public $id = 'comment';

	public $metric = 'comment';

	public $platform = 'facebook';

	public $property = 'comment';

	public $report = 'FB_ADSET';

	public $type = 'decimal';
};
