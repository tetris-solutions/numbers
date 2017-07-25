<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\Metric\Metric_FloatParser_TrivialSum_Parsable_Summable;

return new class extends Metric_FloatParser_TrivialSum_Parsable_Summable {

	public $entity = 'AdSet';

	public $fields = [
	    "website_clicks"
	];

	public $id = 'website_clicks';

	public $metric = 'website_clicks';

	public $platform = 'facebook';

	public $property = 'website_clicks';

	public $report = 'FB_ADSET';

	public $type = 'decimal';
};
