<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\Metric\Metric_ActionParser_TrivialSum_Parsable_Summable;

return new class extends Metric_ActionParser_TrivialSum_Parsable_Summable {

	public $actionsProperty = 'actions';

	public $actionType = 'commerce_event.view_content';

	public $entity = 'Ad';

	public $fields = [
	    "actions"
	];

	public $id = 'commerce_event.view_content';

	public $metric = 'commerce_event.view_content';

	public $platform = 'facebook';

	public $property = 'commerce_event.view_content';

	public $report = 'FB_AD';

	public $type = 'decimal';
};
