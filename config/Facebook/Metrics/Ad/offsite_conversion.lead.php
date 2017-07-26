<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\Shared\Metric\Metric_ActionParser_TrivialSum_Parsable_Summable;

return new class extends Metric_ActionParser_TrivialSum_Parsable_Summable {

	public $actionsProperty = 'actions';

	public $actionType = 'offsite_conversion.lead';

	public $entity = 'Ad';

	public $fields = [
	    "actions"
	];

	public $id = 'offsite_conversion.lead';

	public $metric = 'offsite_conversion.lead';

	public $platform = 'facebook';

	public $property = 'offsite_conversion.lead';

	public $report = 'FB_AD';

	public $type = 'decimal';
};
