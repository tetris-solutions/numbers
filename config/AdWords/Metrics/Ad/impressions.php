<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\Shared\Metric\Metric_IntegerParser_TrivialSum_Parsable_Summable;

return new class extends Metric_IntegerParser_TrivialSum_Parsable_Summable {

	public $entity = 'Ad';

	public $fields = [
	    "Impressions"
	];

	public $id = 'impressions';

	public $metric = 'impressions';

	public $platform = 'adwords';

	public $property = 'Impressions';

	public $report = 'AD_PERFORMANCE_REPORT';

	public $type = 'integer';
};
