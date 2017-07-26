<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\Shared\Metric\Metric_ActionParser_TrivialSum_Parsable_Summable;

return new class extends Metric_ActionParser_TrivialSum_Parsable_Summable {

	public $actionsProperty = 'video_p75_watched_actions';

	public $actionType = 'video_view';

	public $entity = 'Account';

	public $fields = [
	    "video_p75_watched_actions"
	];

	public $id = 'video_p75_watched_actions';

	public $metric = 'video_p75_watched_actions';

	public $platform = 'facebook';

	public $property = 'video_p75_watched_actions';

	public $report = 'FB_ACCOUNT';

	public $type = 'decimal';
};
