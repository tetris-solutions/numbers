<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\Shared\Metric\Metric_RatioParser_RatioSum_Parsable_Summable;

return new class extends Metric_RatioParser_RatioSum_Parsable_Summable {

	public $dividendMetric = 'spend';

	public $dividendProperty = 'spend';

	public $divisorMetric = 'reach';

	public $divisorProperty = 'reach';

	public $entity = 'AdSet';

	public $fields = [
	    "spend",
	    "reach"
	];

	public $id = 'cpr';

	public $inferred_from = [
	    "spend",
	    "reach"
	];

	public $metric = 'cpr';

	public $platform = 'facebook';

	public $property = 'cpr';

	public $report = 'FB_ADSET';

	public $type = 'currency';
};
