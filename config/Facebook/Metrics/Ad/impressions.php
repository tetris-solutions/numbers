<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\Shared\Metric\Metric_FloatParser_TrivialSum_Parsable_Summable;

return new class extends Metric_FloatParser_TrivialSum_Parsable_Summable {

	public $entity = 'Ad';

	public $fields = [
	    "impressions"
	];

	public $id = 'impressions';

	public $metric = 'impressions';

	public $platform = 'facebook';

	public $property = 'impressions';

	public $report = 'FB_AD';

	public $type = 'decimal';
};
