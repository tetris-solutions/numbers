<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\Shared\Metric\Metric_ActionParser_TrivialSum_Parsable_Summable;

return new class extends Metric_ActionParser_TrivialSum_Parsable_Summable {

	public $actionsProperty = 'actions';

	public $actionType = 'messenger.reply';

	public $entity = 'Ad';

	public $fields = [
	    "actions"
	];

	public $id = 'messenger.reply';

	public $metric = 'messenger.reply';

	public $platform = 'facebook';

	public $property = 'messenger.reply';

	public $report = 'FB_AD';

	public $type = 'decimal';
};
