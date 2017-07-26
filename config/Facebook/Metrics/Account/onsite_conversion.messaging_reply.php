<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\Shared\Metric\Metric_ActionParser_TrivialSum_Parsable_Summable;

return new class extends Metric_ActionParser_TrivialSum_Parsable_Summable {

	public $actionsProperty = 'actions';

	public $actionType = 'onsite_conversion.messaging_reply';

	public $entity = 'Account';

	public $fields = [
	    "actions"
	];

	public $id = 'onsite_conversion.messaging_reply';

	public $metric = 'onsite_conversion.messaging_reply';

	public $platform = 'facebook';

	public $property = 'onsite_conversion.messaging_reply';

	public $report = 'FB_ACCOUNT';

	public $type = 'decimal';
};
