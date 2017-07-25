<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\Metric\Metric_ActionParser_TrivialSum_Parsable_Summable;

return new class extends Metric_ActionParser_TrivialSum_Parsable_Summable {

	public $actionsProperty = 'actions';

	public $actionType = 'video_view';

	public $entity = 'Campaign';

	public $fields = [
	    "actions"
	];

	public $id = 'video_view';

	public $metric = 'video_view';

	public $platform = 'facebook';

	public $property = 'video_view';

	public $report = 'FB_CAMPAIGN';

	public $type = 'decimal';
};
