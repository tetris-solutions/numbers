<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\Shared\Metric\Metric_PercentParser_Parsable;

return new class extends Metric_PercentParser_Parsable {

	public $entity = 'Campaign';

	public $fields = [
	    "ga:percentNewSessions"
	];

	public $id = 'percentnewsessions';

	public $metric = 'percentnewsessions';

	public $platform = 'analytics';

	public $property = 'ga:percentNewSessions';

	public $report = 'GA_DEFAULT';

	public $type = 'percentage';
};
