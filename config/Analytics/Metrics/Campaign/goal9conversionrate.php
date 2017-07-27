<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\Shared\Metric\Metric_PercentParser_Parsable;

return new class extends Metric_PercentParser_Parsable {

	public $entity = 'Campaign';

	public $fields = [
	    "ga:goal9ConversionRate"
	];

	public $id = 'goal9conversionrate';

	public $metric = 'goal9conversionrate';

	public $platform = 'analytics';

	public $property = 'ga:goal9ConversionRate';

	public $report = 'GA_DEFAULT';

	public $type = 'percentage';
};
