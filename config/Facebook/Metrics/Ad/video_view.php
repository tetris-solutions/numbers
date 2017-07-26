<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\Shared\Metric\Metric_ActionParser_TrivialSum_Parsable_Summable;

return new class extends Metric_ActionParser_TrivialSum_Parsable_Summable {

	public $actionsProperty = 'actions';

	public $actionType = 'video_view';

	public $entity = 'Ad';

	public $fields = [
	    "actions"
	];

	public $id = 'video_view';

	public $metric = 'video_view';

	public $platform = 'facebook';

	public $property = 'video_view';

	public $report = 'FB_AD';

	public $type = 'decimal';
};
