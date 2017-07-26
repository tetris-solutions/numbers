<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\Shared\Metric\Metric_FloatParser_TrivialSum_Parsable_Summable;

return new class extends Metric_FloatParser_TrivialSum_Parsable_Summable {

	public $entity = 'Account';

	public $fields = [
	    "social_clicks"
	];

	public $id = 'social_clicks';

	public $metric = 'social_clicks';

	public $platform = 'facebook';

	public $property = 'social_clicks';

	public $report = 'FB_ACCOUNT';

	public $type = 'decimal';
};
