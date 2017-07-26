<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\Shared\Metric\Metric_FacebookCPV100Parser_RatioSum_Parsable_Summable;

return new class extends Metric_FacebookCPV100Parser_RatioSum_Parsable_Summable {

	public $actionsProperty = 'video_p100_watched_actions';

	public $actionType = 'video_view';

	public $dividendMetric = 'spend';

	public $divisorMetric = 'video_p100_watched_actions';

	public $entity = 'Ad';

	public $fields = [
	    "spend",
	    "video_p100_watched_actions"
	];

	public $id = 'cpv100';

	public $inferred_from = [
	    "spend",
	    "video_p100_watched_actions"
	];

	public $metric = 'cpv100';

	public $platform = 'facebook';

	public $property = 'cpv100';

	public $report = 'FB_AD';

	public $spendProperty = 'spend';

	public $type = 'currency';
};
