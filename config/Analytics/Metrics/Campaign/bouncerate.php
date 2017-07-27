<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\Metric\Metric_PercentParser_Parsable;

return new class extends Metric_PercentParser_Parsable {

	public $entity = 'Campaign';

	public $fields = [
	    "ga:bounceRate"
	];

	public $id = 'bouncerate';

	public $metric = 'bouncerate';

	public $platform = 'analytics';

	public $property = 'ga:bounceRate';

	public $report = 'GA_DEFAULT';

	public $type = 'percentage';
};
