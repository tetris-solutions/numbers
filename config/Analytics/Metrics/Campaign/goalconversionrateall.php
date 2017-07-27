<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\Metric\Metric_PercentParser_Parsable;

return new class extends Metric_PercentParser_Parsable {

	public $entity = 'Campaign';

	public $fields = [
	    "ga:goalConversionRateAll"
	];

	public $id = 'goalconversionrateall';

	public $metric = 'goalconversionrateall';

	public $platform = 'analytics';

	public $property = 'ga:goalConversionRateAll';

	public $report = 'GA_DEFAULT';

	public $type = 'percentage';
};
