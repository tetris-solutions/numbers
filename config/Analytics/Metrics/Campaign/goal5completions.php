<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\Metric\Metric_IntegerParser_TrivialSum_Parsable_Summable;

return new class extends Metric_IntegerParser_TrivialSum_Parsable_Summable {

	public $entity = 'Campaign';

	public $fields = [
	    "ga:goal5Completions"
	];

	public $id = 'goal5completions';

	public $metric = 'goal5completions';

	public $platform = 'analytics';

	public $property = 'ga:goal5Completions';

	public $report = 'GA_DEFAULT';

	public $type = 'integer';
};
