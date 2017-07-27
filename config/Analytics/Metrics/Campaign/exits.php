<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\Metric\Metric_IntegerParser_TrivialSum_Parsable_Summable;

return new class extends Metric_IntegerParser_TrivialSum_Parsable_Summable {

	public $entity = 'Campaign';

	public $fields = [
	    "ga:exits"
	];

	public $id = 'exits';

	public $metric = 'exits';

	public $platform = 'analytics';

	public $property = 'ga:exits';

	public $report = 'GA_DEFAULT';

	public $type = 'integer';
};
