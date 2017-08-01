<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\Metric\Metric_ActionParser_TrivialSum_Parsable_Summable;

return new class extends Metric_ActionParser_TrivialSum_Parsable_Summable {

	public $actionsProperty = 'actions';

	public $actionType = 'full_view';

	public $entity = 'Ad';

	public $fields = [
	    "actions"
	];

	public $id = 'full_view';

	public $metric = 'full_view';

	public $platform = 'facebook';

	public $property = 'full_view';

	public $report = 'FB_AD';

	public $type = 'decimal';
};
