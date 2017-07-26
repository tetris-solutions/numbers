<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\Shared\Metric\Metric_ActionParser_TrivialSum_Parsable_Summable;

return new class extends Metric_ActionParser_TrivialSum_Parsable_Summable {

	public $actionsProperty = 'video_15_sec_watched_actions';

	public $actionType = 'video_view';

	public $entity = 'AdSet';

	public $fields = [
	    "video_15_sec_watched_actions"
	];

	public $id = 'video_15_sec_watched_actions';

	public $metric = 'video_15_sec_watched_actions';

	public $platform = 'facebook';

	public $property = 'video_15_sec_watched_actions';

	public $report = 'FB_ADSET';

	public $type = 'decimal';
};
