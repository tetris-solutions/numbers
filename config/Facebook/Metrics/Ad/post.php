<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\Metric\Metric_ActionParser_TrivialSum_Parsable_Summable;

return new class extends Metric_ActionParser_TrivialSum_Parsable_Summable {

	public $actionsProperty = 'actions';

	public $actionType = 'post';

	public $entity = 'Ad';

	public $fields = [
	    "actions"
	];

	public $id = 'post';

	public $metric = 'post';

	public $platform = 'facebook';

	public $property = 'post';

	public $report = 'FB_AD';

	public $type = 'decimal';
};
