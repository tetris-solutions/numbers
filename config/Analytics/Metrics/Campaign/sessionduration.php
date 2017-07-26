<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\Shared\Metric\Metric_RawParser_Parsable;

return new class extends Metric_RawParser_Parsable {

	public $entity = 'Campaign';

	public $fields = [
	    "ga:sessionDuration"
	];

	public $id = 'sessionduration';

	public $metric = 'sessionduration';

	public $platform = 'analytics';

	public $property = 'ga:sessionDuration';

	public $report = 'GA_DEFAULT';

	public $type = 'time';
};
