<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\Metric\Metric_FloatParser_TrivialSum_Parsable_Summable;

return new class extends Metric_FloatParser_TrivialSum_Parsable_Summable {

	public $entity = 'AdSet';

	public $fields = [
	    "spend"
	];

	public $id = 'spend';

	public $metric = 'spend';

	public $platform = 'facebook';

	public $property = 'spend';

	public $report = 'FB_ADSET';

	public $type = 'currency';
};
