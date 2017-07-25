<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\Metric\Metric_IntegerParser_TrivialSum_Parsable_Summable;

return new class extends Metric_IntegerParser_TrivialSum_Parsable_Summable {

	public $entity = 'Ad';

	public $fields = [
	    "ViewThroughConversions"
	];

	public $id = 'viewthroughconversions';

	public $metric = 'viewthroughconversions';

	public $platform = 'adwords';

	public $property = 'ViewThroughConversions';

	public $report = 'AD_PERFORMANCE_REPORT';

	public $type = 'integer';
};
