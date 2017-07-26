<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\Shared\Metric\Metric_FloatParser_RatioSum_Parsable_Summable;

return new class extends Metric_FloatParser_RatioSum_Parsable_Summable {

	public $dividendMetric = 'inline_link_clicks';

	public $divisorMetric = 'impressions';

	public $entity = 'AdSet';

	public $fields = [
	    "inline_link_click_ctr"
	];

	public $id = 'inline_link_click_ctr';

	public $inferred_from = [
	    "inline_link_clicks",
	    "impressions"
	];

	public $metric = 'inline_link_click_ctr';

	public $platform = 'facebook';

	public $property = 'inline_link_click_ctr';

	public $report = 'FB_ADSET';

	public $type = 'decimal';
};
