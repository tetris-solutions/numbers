<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\Shared\Metric\Metric_ActionParser_TrivialSum_Parsable_Summable;

return new class extends Metric_ActionParser_TrivialSum_Parsable_Summable {

	public $actionsProperty = 'actions';

	public $actionType = 'games.plays';

	public $entity = 'Account';

	public $fields = [
	    "actions"
	];

	public $id = 'games.plays';

	public $metric = 'games.plays';

	public $platform = 'facebook';

	public $property = 'games.plays';

	public $report = 'FB_ACCOUNT';

	public $type = 'decimal';
};
