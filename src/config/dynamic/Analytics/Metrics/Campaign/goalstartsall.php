<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\Metric\Metric_IntegerParser_TrivialSum_Parsable_Summable;

return new class extends Metric_IntegerParser_TrivialSum_Parsable_Summable {

	public $entity = 'Campaign';

	public $fields = [
	    "ga:goalStartsAll"
	];

	public $id = 'goalstartsall';

	public $metric = 'goalstartsall';

	public $platform = 'analytics';

	public $property = 'ga:goalStartsAll';

	public $report = 'GA_DEFAULT';

	public $type = 'integer';
};
