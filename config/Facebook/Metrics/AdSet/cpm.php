<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\Shared\Metric\Metric_FloatParser_RatioSum_Parsable_Summable;

return new class extends Metric_FloatParser_RatioSum_Parsable_Summable {

	public $dividendMetric = 'spend';

	public $divisorMetric = 'impressions';

	public $entity = 'AdSet';

	public $fields = [
	    "cpm"
	];

	public $id = 'cpm';

	public $inferred_from = [
	    "spend",
	    "impressions"
	];

	public $metric = 'cpm';

	public $platform = 'facebook';

	public $property = 'cpm';

	public $report = 'FB_ADSET';

	public $type = 'currency';
};
