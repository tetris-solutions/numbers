<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\Shared\Metric\Metric_FloatParser_TrivialSum_Parsable_Summable;

return new class extends Metric_FloatParser_TrivialSum_Parsable_Summable {

	public $entity = 'Campaign';

	public $fields = [
	    "deeplink_clicks"
	];

	public $id = 'deeplink_clicks';

	public $metric = 'deeplink_clicks';

	public $platform = 'facebook';

	public $property = 'deeplink_clicks';

	public $report = 'FB_CAMPAIGN';

	public $type = 'decimal';
};
