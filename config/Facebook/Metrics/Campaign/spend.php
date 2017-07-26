<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\Shared\Metric\Metric_FloatParser_TrivialSum_Parsable_Summable;

return new class extends Metric_FloatParser_TrivialSum_Parsable_Summable {

	public $entity = 'Campaign';

	public $fields = [
	    "spend"
	];

	public $id = 'spend';

	public $metric = 'spend';

	public $platform = 'facebook';

	public $property = 'spend';

	public $report = 'FB_CAMPAIGN';

	public $type = 'currency';
};
