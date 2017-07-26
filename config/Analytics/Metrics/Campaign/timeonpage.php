<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\Shared\Metric\Metric_RawParser_Parsable;

return new class extends Metric_RawParser_Parsable {

	public $entity = 'Campaign';

	public $fields = [
	    "ga:timeOnPage"
	];

	public $id = 'timeonpage';

	public $metric = 'timeonpage';

	public $platform = 'analytics';

	public $property = 'ga:timeOnPage';

	public $report = 'GA_DEFAULT';

	public $type = 'time';
};
