<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\Shared\Metric\Metric_PercentParser_Parsable;

return new class extends Metric_PercentParser_Parsable {

	public $entity = 'Campaign';

	public $fields = [
	    "ga:goal6ConversionRate"
	];

	public $id = 'goal6conversionrate';

	public $metric = 'goal6conversionrate';

	public $platform = 'analytics';

	public $property = 'ga:goal6ConversionRate';

	public $report = 'GA_DEFAULT';

	public $type = 'percentage';
};
