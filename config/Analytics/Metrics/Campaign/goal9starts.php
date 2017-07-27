<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\Shared\Metric\Metric_IntegerParser_TrivialSum_Parsable_Summable;

return new class extends Metric_IntegerParser_TrivialSum_Parsable_Summable {

	public $entity = 'Campaign';

	public $fields = [
	    "ga:goal9Starts"
	];

	public $id = 'goal9starts';

	public $metric = 'goal9starts';

	public $platform = 'analytics';

	public $property = 'ga:goal9Starts';

	public $report = 'GA_DEFAULT';

	public $type = 'integer';
};
