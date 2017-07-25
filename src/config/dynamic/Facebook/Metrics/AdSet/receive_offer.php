<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\Metric\Metric_ActionParser_TrivialSum_Parsable_Summable;

return new class extends Metric_ActionParser_TrivialSum_Parsable_Summable {

	public $actionsProperty = 'actions';

	public $actionType = 'receive_offer';

	public $entity = 'AdSet';

	public $fields = [
	    "actions"
	];

	public $id = 'receive_offer';

	public $metric = 'receive_offer';

	public $platform = 'facebook';

	public $property = 'receive_offer';

	public $report = 'FB_ADSET';

	public $type = 'decimal';
};
