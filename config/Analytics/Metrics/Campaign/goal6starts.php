<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\Shared\Metric\Metric_IntegerParser_TrivialSum_Parsable_Summable;

return new class extends Metric_IntegerParser_TrivialSum_Parsable_Summable {

	public $entity = 'Campaign';

	public $fields = [
	    "ga:goal6Starts"
	];

	public $id = 'goal6starts';

	public $metric = 'goal6starts';

	public $platform = 'analytics';

	public $property = 'ga:goal6Starts';

	public $report = 'GA_DEFAULT';

	public $type = 'integer';
};
