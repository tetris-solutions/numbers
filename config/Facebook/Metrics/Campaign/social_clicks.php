<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\Metric\Metric_FloatParser_TrivialSum_Parsable_Summable;

return new class extends Metric_FloatParser_TrivialSum_Parsable_Summable {

	public $entity = 'Campaign';

	public $fields = [
	    "social_clicks"
	];

	public $id = 'social_clicks';

	public $metric = 'social_clicks';

	public $platform = 'facebook';

	public $property = 'social_clicks';

	public $report = 'FB_CAMPAIGN';

	public $type = 'decimal';
};
