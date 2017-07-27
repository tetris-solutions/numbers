<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\Metric\Metric_IntegerParser_TrivialSum_Parsable_Summable;

return new class extends Metric_IntegerParser_TrivialSum_Parsable_Summable {

	public $entity = 'Campaign';

	public $fields = [
	    "ga:goal10Starts"
	];

	public $id = 'goal10starts';

	public $metric = 'goal10starts';

	public $platform = 'analytics';

	public $property = 'ga:goal10Starts';

	public $report = 'GA_DEFAULT';

	public $type = 'integer';
};
