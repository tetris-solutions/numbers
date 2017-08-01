<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\Metric\Metric_FloatParser_TrivialSum_Parsable_Summable;

return new class extends Metric_FloatParser_TrivialSum_Parsable_Summable {

	public $entity = 'Campaign';

	public $fields = [
	    "social_impressions"
	];

	public $id = 'social_impressions';

	public $metric = 'social_impressions';

	public $platform = 'facebook';

	public $property = 'social_impressions';

	public $report = 'FB_CAMPAIGN';

	public $type = 'decimal';
};
