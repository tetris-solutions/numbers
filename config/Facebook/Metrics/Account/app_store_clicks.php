<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\Shared\Metric\Metric_FloatParser_TrivialSum_Parsable_Summable;

return new class extends Metric_FloatParser_TrivialSum_Parsable_Summable {

	public $entity = 'Account';

	public $fields = [
	    "app_store_clicks"
	];

	public $id = 'app_store_clicks';

	public $metric = 'app_store_clicks';

	public $platform = 'facebook';

	public $property = 'app_store_clicks';

	public $report = 'FB_ACCOUNT';

	public $type = 'decimal';
};
