<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\Metric\Metric_PercentParser_Parsable;

return new class extends Metric_PercentParser_Parsable {

	public $entity = 'Campaign';

	public $fields = [
	    "ga:goal2ConversionRate"
	];

	public $id = 'goal2conversionrate';

	public $metric = 'goal2conversionrate';

	public $platform = 'analytics';

	public $property = 'ga:goal2ConversionRate';

	public $report = 'GA_DEFAULT';

	public $type = 'percentage';
};
