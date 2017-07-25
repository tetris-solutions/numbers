<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\Metric\Metric_ActionParser_TrivialSum_Parsable_Summable;

return new class extends Metric_ActionParser_TrivialSum_Parsable_Summable {

	public $actionsProperty = 'actions';

	public $actionType = 'commerce_event.add_to_cart';

	public $entity = 'Account';

	public $fields = [
	    "actions"
	];

	public $id = 'commerce_event.add_to_cart';

	public $metric = 'commerce_event.add_to_cart';

	public $platform = 'facebook';

	public $property = 'commerce_event.add_to_cart';

	public $report = 'FB_ACCOUNT';

	public $type = 'decimal';
};
