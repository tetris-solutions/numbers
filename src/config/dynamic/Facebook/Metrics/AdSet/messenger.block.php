<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\Metric\Metric_ActionParser_TrivialSum_Parsable_Summable;

return new class extends Metric_ActionParser_TrivialSum_Parsable_Summable {

	public $actionsProperty = 'actions';

	public $actionType = 'messenger.block';

	public $entity = 'AdSet';

	public $fields = [
	    "actions"
	];

	public $id = 'messenger.block';

	public $metric = 'messenger.block';

	public $platform = 'facebook';

	public $property = 'messenger.block';

	public $report = 'FB_ADSET';

	public $type = 'decimal';
};
