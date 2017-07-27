<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\Shared\Metric\Metric_IntegerParser_TrivialSum_Parsable_Summable;

return new class extends Metric_IntegerParser_TrivialSum_Parsable_Summable {

	public $entity = 'Campaign';

	public $fields = [
	    "ga:goal2Completions"
	];

	public $id = 'goal2completions';

	public $metric = 'goal2completions';

	public $platform = 'analytics';

	public $property = 'ga:goal2Completions';

	public $report = 'GA_DEFAULT';

	public $type = 'integer';
};
