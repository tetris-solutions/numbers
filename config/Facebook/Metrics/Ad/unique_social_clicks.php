<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\Shared\Metric\Metric_FloatParser_TrivialSum_Parsable_Summable;

return new class extends Metric_FloatParser_TrivialSum_Parsable_Summable {

	public $entity = 'Ad';

	public $fields = [
	    "unique_social_clicks"
	];

	public $id = 'unique_social_clicks';

	public $metric = 'unique_social_clicks';

	public $platform = 'facebook';

	public $property = 'unique_social_clicks';

	public $report = 'FB_AD';

	public $type = 'decimal';
};
