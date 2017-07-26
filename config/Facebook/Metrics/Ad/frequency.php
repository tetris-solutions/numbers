<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\Shared\Metric\Metric_FloatParser_RatioSum_Parsable_Summable;

return new class extends Metric_FloatParser_RatioSum_Parsable_Summable {

	public $dividendMetric = 'impressions';

	public $divisorMetric = 'reach';

	public $entity = 'Ad';

	public $fields = [
	    "frequency"
	];

	public $id = 'frequency';

	public $inferred_from = [
	    "impressions",
	    "reach"
	];

	public $metric = 'frequency';

	public $platform = 'facebook';

	public $property = 'frequency';

	public $report = 'FB_AD';

	public $type = 'decimal';
};
