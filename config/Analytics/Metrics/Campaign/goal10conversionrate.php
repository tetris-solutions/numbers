<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\Metric\Metric_PercentParser_Parsable;

return new class extends Metric_PercentParser_Parsable {

	public $entity = 'Campaign';

	public $fields = [
	    "ga:goal10ConversionRate"
	];

	public $id = 'goal10conversionrate';

	public $metric = 'goal10conversionrate';

	public $platform = 'analytics';

	public $property = 'ga:goal10ConversionRate';

	public $report = 'GA_DEFAULT';

	public $type = 'percentage';
};
