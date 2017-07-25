<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\Metric\Metric_IntegerParser_TrivialSum_Parsable_Summable;

return new class extends Metric_IntegerParser_TrivialSum_Parsable_Summable {

	public $entity = 'Campaign';

	public $fields = [
	    "ga:impressions"
	];

	public $id = 'impressions';

	public $metric = 'impressions';

	public $platform = 'analytics';

	public $property = 'ga:impressions';

	public $report = 'GA_DEFAULT';

	public $type = 'integer';
};
