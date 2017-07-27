<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\Metric\Metric_FloatParser_TrivialSum_Parsable_Summable;

return new class extends Metric_FloatParser_TrivialSum_Parsable_Summable {

	public $entity = 'Ad';

	public $fields = [
	    "app_store_clicks"
	];

	public $id = 'app_store_clicks';

	public $metric = 'app_store_clicks';

	public $platform = 'facebook';

	public $property = 'app_store_clicks';

	public $report = 'FB_AD';

	public $type = 'decimal';
};
