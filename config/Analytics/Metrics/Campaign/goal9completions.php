<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\Shared\Metric\Metric_IntegerParser_TrivialSum_Parsable_Summable;

return new class extends Metric_IntegerParser_TrivialSum_Parsable_Summable {

	public $entity = 'Campaign';

	public $fields = [
	    "ga:goal9Completions"
	];

	public $id = 'goal9completions';

	public $metric = 'goal9completions';

	public $platform = 'analytics';

	public $property = 'ga:goal9Completions';

	public $report = 'GA_DEFAULT';

	public $type = 'integer';
};
