<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\Shared\Metric\Metric_IntegerParser_TrivialSum_Parsable_Summable;

return new class extends Metric_IntegerParser_TrivialSum_Parsable_Summable {

	public $entity = 'Campaign';

	public $fields = [
	    "ga:goal3Completions"
	];

	public $id = 'goal3completions';

	public $metric = 'goal3completions';

	public $platform = 'analytics';

	public $property = 'ga:goal3Completions';

	public $report = 'GA_DEFAULT';

	public $type = 'integer';
};
