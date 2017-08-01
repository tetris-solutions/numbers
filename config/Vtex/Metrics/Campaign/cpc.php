<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\Metric\Metric_FloatParser_RatioSum_Parsable_Summable;

return new class extends Metric_FloatParser_RatioSum_Parsable_Summable {

	public $dividendMetric = 'spend';

	public $divisorMetric = 'clicks';

	public $entity = 'Campaign';

	public $fields = [
	    "cpc"
	];

	public $id = 'cpc';

	public $inferred_from = [
	    "spend",
	    "clicks"
	];

	public $metric = 'cpc';

	public $platform = 'facebook';

	public $property = 'cpc';

	public $report = 'FB_CAMPAIGN';

	public $type = 'currency';
};
