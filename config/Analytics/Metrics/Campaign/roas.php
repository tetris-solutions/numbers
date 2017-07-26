<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\Shared\Metric\Metric_PercentParser_Parsable;

return new class extends Metric_PercentParser_Parsable {

	public $entity = 'Campaign';

	public $fields = [
	    "ga:ROAS"
	];

	public $id = 'roas';

	public $metric = 'roas';

	public $platform = 'analytics';

	public $property = 'ga:ROAS';

	public $report = 'GA_DEFAULT';

	public $type = 'percentage';
};
