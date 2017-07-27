<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\Shared\Metric\Metric_PercentParser_Parsable;

return new class extends Metric_PercentParser_Parsable {

	public $entity = 'Campaign';

	public $fields = [
	    "ga:goal4ConversionRate"
	];

	public $id = 'goal4conversionrate';

	public $metric = 'goal4conversionrate';

	public $platform = 'analytics';

	public $property = 'ga:goal4ConversionRate';

	public $report = 'GA_DEFAULT';

	public $type = 'percentage';
};
