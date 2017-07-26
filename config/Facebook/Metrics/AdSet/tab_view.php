<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\Shared\Metric\Metric_ActionParser_TrivialSum_Parsable_Summable;

return new class extends Metric_ActionParser_TrivialSum_Parsable_Summable {

	public $actionsProperty = 'actions';

	public $actionType = 'tab_view';

	public $entity = 'AdSet';

	public $fields = [
	    "actions"
	];

	public $id = 'tab_view';

	public $metric = 'tab_view';

	public $platform = 'facebook';

	public $property = 'tab_view';

	public $report = 'FB_ADSET';

	public $type = 'decimal';
};
