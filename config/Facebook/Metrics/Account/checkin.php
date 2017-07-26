<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\Shared\Metric\Metric_ActionParser_TrivialSum_Parsable_Summable;

return new class extends Metric_ActionParser_TrivialSum_Parsable_Summable {

	public $actionsProperty = 'actions';

	public $actionType = 'checkin';

	public $entity = 'Account';

	public $fields = [
	    "actions"
	];

	public $id = 'checkin';

	public $metric = 'checkin';

	public $platform = 'facebook';

	public $property = 'checkin';

	public $report = 'FB_ACCOUNT';

	public $type = 'decimal';
};
