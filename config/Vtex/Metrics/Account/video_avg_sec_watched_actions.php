<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\Metric\Metric_ActionParser_Parsable;

return new class extends Metric_ActionParser_Parsable {

	public $actionsProperty = 'video_avg_sec_watched_actions';

	public $actionType = 'video_view';

	public $entity = 'Account';

	public $fields = [
	    "video_avg_sec_watched_actions"
	];

	public $id = 'video_avg_sec_watched_actions';

	public $metric = 'video_avg_sec_watched_actions';

	public $platform = 'facebook';

	public $property = 'video_avg_sec_watched_actions';

	public $report = 'FB_ACCOUNT';

	public $type = 'decimal';
};
