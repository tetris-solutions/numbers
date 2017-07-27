<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\Metric\Metric_PercentParser_Parsable;

return new class extends Metric_PercentParser_Parsable {

	public $entity = 'Campaign';

	public $fields = [
	    "ga:goal8ConversionRate"
	];

	public $id = 'goal8conversionrate';

	public $metric = 'goal8conversionrate';

	public $platform = 'analytics';

	public $property = 'ga:goal8ConversionRate';

	public $report = 'GA_DEFAULT';

	public $type = 'percentage';
};
