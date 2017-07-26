<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\Shared\Metric\Metric_FloatParser_RatioSum_Parsable_Summable;

return new class extends Metric_FloatParser_RatioSum_Parsable_Summable {

	public $dividendMetric = 'spend';

	public $divisorMetric = 'clicks';

	public $entity = 'Ad';

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

	public $report = 'FB_AD';

	public $type = 'currency';
};
