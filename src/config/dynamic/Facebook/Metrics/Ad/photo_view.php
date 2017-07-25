<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\Metric\Metric_ActionParser_TrivialSum_Parsable_Summable;

return new class extends Metric_ActionParser_TrivialSum_Parsable_Summable {

	public $actionsProperty = 'actions';

	public $actionType = 'photo_view';

	public $entity = 'Ad';

	public $fields = [
	    "actions"
	];

	public $id = 'photo_view';

	public $metric = 'photo_view';

	public $platform = 'facebook';

	public $property = 'photo_view';

	public $report = 'FB_AD';

	public $type = 'decimal';
};
