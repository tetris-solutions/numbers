<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\Shared\Metric\Metric_FloatParser_TrivialSum_Parsable_Summable;

return new class extends Metric_FloatParser_TrivialSum_Parsable_Summable {

	public $entity = 'AdSet';

	public $fields = [
	    "social_spend"
	];

	public $id = 'social_spend';

	public $metric = 'social_spend';

	public $platform = 'facebook';

	public $property = 'social_spend';

	public $report = 'FB_ADSET';

	public $type = 'currency';
};
