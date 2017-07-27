<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\Metric\Metric_IntegerParser_TrivialSum_Parsable_Summable;

return new class extends Metric_IntegerParser_TrivialSum_Parsable_Summable {

	public $entity = 'Campaign';

	public $fields = [
	    "ga:bounces"
	];

	public $id = 'bounces';

	public $metric = 'bounces';

	public $platform = 'analytics';

	public $property = 'ga:bounces';

	public $report = 'GA_DEFAULT';

	public $type = 'integer';
};
