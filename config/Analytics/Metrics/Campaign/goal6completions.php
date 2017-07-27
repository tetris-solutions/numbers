<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\Metric\Metric_IntegerParser_TrivialSum_Parsable_Summable;

return new class extends Metric_IntegerParser_TrivialSum_Parsable_Summable {

	public $entity = 'Campaign';

	public $fields = [
	    "ga:goal6Completions"
	];

	public $id = 'goal6completions';

	public $metric = 'goal6completions';

	public $platform = 'analytics';

	public $property = 'ga:goal6Completions';

	public $report = 'GA_DEFAULT';

	public $type = 'integer';
};
