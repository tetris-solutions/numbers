<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\Shared\Metric\Metric_IntegerParser_TrivialSum_Parsable_Summable;

return new class extends Metric_IntegerParser_TrivialSum_Parsable_Summable {

	public $entity = 'Campaign';

	public $fields = [
	    "ga:goal1Completions"
	];

	public $id = 'goal1completions';

	public $metric = 'goal1completions';

	public $platform = 'analytics';

	public $property = 'ga:goal1Completions';

	public $report = 'GA_DEFAULT';

	public $type = 'integer';
};
