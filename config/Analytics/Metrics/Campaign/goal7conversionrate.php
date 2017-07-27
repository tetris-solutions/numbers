<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\Shared\Metric\Metric_PercentParser_Parsable;

return new class extends Metric_PercentParser_Parsable {

	public $entity = 'Campaign';

	public $fields = [
	    "ga:goal7ConversionRate"
	];

	public $id = 'goal7conversionrate';

	public $metric = 'goal7conversionrate';

	public $platform = 'analytics';

	public $property = 'ga:goal7ConversionRate';

	public $report = 'GA_DEFAULT';

	public $type = 'percentage';
};
