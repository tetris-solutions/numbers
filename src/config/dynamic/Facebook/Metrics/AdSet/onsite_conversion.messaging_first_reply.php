<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\Metric\Metric_ActionParser_TrivialSum_Parsable_Summable;

return new class extends Metric_ActionParser_TrivialSum_Parsable_Summable {

	public $actionsProperty = 'actions';

	public $actionType = 'onsite_conversion.messaging_first_reply';

	public $entity = 'AdSet';

	public $fields = [
	    "actions"
	];

	public $id = 'onsite_conversion.messaging_first_reply';

	public $metric = 'onsite_conversion.messaging_first_reply';

	public $platform = 'facebook';

	public $property = 'onsite_conversion.messaging_first_reply';

	public $report = 'FB_ADSET';

	public $type = 'decimal';
};
