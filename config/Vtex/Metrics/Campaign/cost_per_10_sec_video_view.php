<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\Metric\Metric_ActionParser_TrivialSum_Parsable_Summable;

return new class extends Metric_ActionParser_TrivialSum_Parsable_Summable {

	public $actionsProperty = 'cost_per_10_sec_video_view';

	public $actionType = 'video_view';

	public $entity = 'Campaign';

	public $fields = [
	    "cost_per_10_sec_video_view"
	];

	public $id = 'cost_per_10_sec_video_view';

	public $metric = 'cost_per_10_sec_video_view';

	public $platform = 'facebook';

	public $property = 'cost_per_10_sec_video_view';

	public $report = 'FB_CAMPAIGN';

	public $type = 'currency';
};
