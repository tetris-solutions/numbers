<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\Shared\Metric\Metric_IntegerParser_TrivialSum_Parsable_Summable;

return new class extends Metric_IntegerParser_TrivialSum_Parsable_Summable {

	public $entity = 'Campaign';

	public $fields = [
	    "ga:sessions"
	];

	public $id = 'sessions';

	public $metric = 'sessions';

	public $platform = 'analytics';

	public $property = 'ga:sessions';

	public $report = 'GA_DEFAULT';

	public $type = 'integer';
};
