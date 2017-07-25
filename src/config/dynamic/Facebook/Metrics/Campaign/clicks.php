<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\Metric\Metric_FloatParser_TrivialSum_Parsable_Summable;

return new class extends Metric_FloatParser_TrivialSum_Parsable_Summable {

	public $entity = 'Campaign';

	public $fields = [
	    "clicks"
	];

	public $id = 'clicks';

	public $metric = 'clicks';

	public $platform = 'facebook';

	public $property = 'clicks';

	public $report = 'FB_CAMPAIGN';

	public $type = 'decimal';
};
