<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\Shared\Metric\Metric_FloatParser_TrivialSum_Parsable_Summable;

return new class extends Metric_FloatParser_TrivialSum_Parsable_Summable {

	public $entity = 'Ad';

	public $fields = [
	    "clicks"
	];

	public $id = 'clicks';

	public $metric = 'clicks';

	public $platform = 'facebook';

	public $property = 'clicks';

	public $report = 'FB_AD';

	public $type = 'decimal';
};
