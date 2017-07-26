<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\Shared\Metric\Metric_PercentParser_RatioSum_Parsable_Summable;

return new class extends Metric_PercentParser_RatioSum_Parsable_Summable {

	public $dividendMetric = 'clicks';

	public $divisorMetric = 'impressions';

	public $entity = 'Ad';

	public $fields = [
	    "ctr"
	];

	public $id = 'ctr';

	public $inferred_from = [
	    "clicks",
	    "impressions"
	];

	public $metric = 'ctr';

	public $platform = 'facebook';

	public $property = 'ctr';

	public $report = 'FB_AD';

	public $type = 'percentage';
};
