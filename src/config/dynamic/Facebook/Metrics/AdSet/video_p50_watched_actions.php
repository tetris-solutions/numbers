<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\Metric\Metric_ActionParser_TrivialSum_Parsable_Summable;

return new class extends Metric_ActionParser_TrivialSum_Parsable_Summable {

	public $actionsProperty = 'video_p50_watched_actions';

	public $actionType = 'video_view';

	public $entity = 'AdSet';

	public $fields = [
	    "video_p50_watched_actions"
	];

	public $id = 'video_p50_watched_actions';

	public $metric = 'video_p50_watched_actions';

	public $platform = 'facebook';

	public $property = 'video_p50_watched_actions';

	public $report = 'FB_ADSET';

	public $type = 'decimal';
};
