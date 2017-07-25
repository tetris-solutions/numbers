<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\Metric\Metric_ViewRateParser_RatioSum_Parsable_Summable;

return new class extends Metric_ViewRateParser_RatioSum_Parsable_Summable {

	public $actionsProperty = 'actions';

	public $actionType = 'video_view';

	public $dividendMetric = 'video_view';

	public $divisorMetric = 'impressions';

	public $entity = 'AdSet';

	public $fields = [
	    "impressions",
	    "actions"
	];

	public $id = 'view_rate';

	public $impressionsProperty = 'impressions';

	public $inferred_from = [
	    "video_view",
	    "impressions"
	];

	public $metric = 'view_rate';

	public $platform = 'facebook';

	public $property = 'view_rate';

	public $report = 'FB_ADSET';

	public $type = 'percentage';
};
