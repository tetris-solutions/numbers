<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\Metric\Metric_FloatParser_RatioSum_Parsable_Summable;

return new class extends Metric_FloatParser_RatioSum_Parsable_Summable {

	public $dividendMetric = 'spend';

	public $divisorMetric = 'clicks';

	public $entity = 'AdSet';

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

	public $report = 'FB_ADSET';

	public $type = 'currency';
};
