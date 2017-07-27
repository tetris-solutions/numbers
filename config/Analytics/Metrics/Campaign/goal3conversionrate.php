<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\Shared\Metric\Metric_PercentParser_Parsable;

return new class extends Metric_PercentParser_Parsable {

	public $entity = 'Campaign';

	public $fields = [
	    "ga:goal3ConversionRate"
	];

	public $id = 'goal3conversionrate';

	public $metric = 'goal3conversionrate';

	public $platform = 'analytics';

	public $property = 'ga:goal3ConversionRate';

	public $report = 'GA_DEFAULT';

	public $type = 'percentage';
};
