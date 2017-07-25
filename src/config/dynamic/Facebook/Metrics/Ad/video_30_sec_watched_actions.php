<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\Metric\Metric_ActionParser_TrivialSum_Parsable_Summable;

return new class extends Metric_ActionParser_TrivialSum_Parsable_Summable {

	public $actionsProperty = 'video_30_sec_watched_actions';

	public $actionType = 'video_view';

	public $entity = 'Ad';

	public $fields = [
	    "video_30_sec_watched_actions"
	];

	public $id = 'video_30_sec_watched_actions';

	public $metric = 'video_30_sec_watched_actions';

	public $platform = 'facebook';

	public $property = 'video_30_sec_watched_actions';

	public $report = 'FB_AD';

	public $type = 'decimal';
};
