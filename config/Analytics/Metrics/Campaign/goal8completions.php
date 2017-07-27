<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\Shared\Metric\Metric_IntegerParser_TrivialSum_Parsable_Summable;

return new class extends Metric_IntegerParser_TrivialSum_Parsable_Summable {

	public $entity = 'Campaign';

	public $fields = [
	    "ga:goal8Completions"
	];

	public $id = 'goal8completions';

	public $metric = 'goal8completions';

	public $platform = 'analytics';

	public $property = 'ga:goal8Completions';

	public $report = 'GA_DEFAULT';

	public $type = 'integer';
};
