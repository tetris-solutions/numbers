<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\Metric\Metric_ActionParser_TrivialSum_Parsable_Summable;

return new class extends Metric_ActionParser_TrivialSum_Parsable_Summable {

	public $actionsProperty = 'actions';

	public $actionType = 'onsite_conversion.purchase';

	public $entity = 'Campaign';

	public $fields = [
	    "actions"
	];

	public $id = 'onsite_conversion.purchase';

	public $metric = 'onsite_conversion.purchase';

	public $platform = 'facebook';

	public $property = 'onsite_conversion.purchase';

	public $report = 'FB_CAMPAIGN';

	public $type = 'decimal';
};
