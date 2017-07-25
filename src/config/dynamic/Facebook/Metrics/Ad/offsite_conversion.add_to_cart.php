<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\Metric\Metric_ActionParser_TrivialSum_Parsable_Summable;

return new class extends Metric_ActionParser_TrivialSum_Parsable_Summable {

	public $actionsProperty = 'actions';

	public $actionType = 'offsite_conversion.add_to_cart';

	public $entity = 'Ad';

	public $fields = [
	    "actions"
	];

	public $id = 'offsite_conversion.add_to_cart';

	public $metric = 'offsite_conversion.add_to_cart';

	public $platform = 'facebook';

	public $property = 'offsite_conversion.add_to_cart';

	public $report = 'FB_AD';

	public $type = 'decimal';
};
