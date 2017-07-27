<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\Metric\Metric_PercentParser_Parsable;

return new class extends Metric_PercentParser_Parsable {

	public $entity = 'Campaign';

	public $fields = [
	    "ga:goal1ConversionRate"
	];

	public $id = 'goal1conversionrate';

	public $metric = 'goal1conversionrate';

	public $platform = 'analytics';

	public $property = 'ga:goal1ConversionRate';

	public $report = 'GA_DEFAULT';

	public $type = 'percentage';
};
