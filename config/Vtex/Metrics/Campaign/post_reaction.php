<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\Metric\Metric_ActionParser_TrivialSum_Parsable_Summable;

return new class extends Metric_ActionParser_TrivialSum_Parsable_Summable {

	public $actionsProperty = 'actions';

	public $actionType = 'post_reaction';

	public $entity = 'Campaign';

	public $fields = [
	    "actions"
	];

	public $id = 'post_reaction';

	public $metric = 'post_reaction';

	public $platform = 'facebook';

	public $property = 'post_reaction';

	public $report = 'FB_CAMPAIGN';

	public $type = 'decimal';
};
