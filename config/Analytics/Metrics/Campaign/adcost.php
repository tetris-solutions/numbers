<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\Shared\Metric\Metric_FloatParser_Parsable;

return new class extends Metric_FloatParser_Parsable {

	public $entity = 'Campaign';

	public $fields = [
	    "ga:adCost"
	];

	public $id = 'adcost';

	public $metric = 'adcost';

	public $platform = 'analytics';

	public $property = 'ga:adCost';

	public $report = 'GA_DEFAULT';

	public $type = 'currency';
};
