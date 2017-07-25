<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\Metric\Metric_ActionParser_TrivialSum_Parsable_Summable;

return new class extends Metric_ActionParser_TrivialSum_Parsable_Summable {

	public $actionsProperty = 'actions';

	public $actionType = 'link_click';

	public $entity = 'Campaign';

	public $fields = [
	    "actions"
	];

	public $id = 'link_click';

	public $metric = 'link_click';

	public $platform = 'facebook';

	public $property = 'link_click';

	public $report = 'FB_CAMPAIGN';

	public $type = 'decimal';
};
