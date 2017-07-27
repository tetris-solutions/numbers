<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\Shared\Metric\Metric_PercentParser_Parsable;

return new class extends Metric_PercentParser_Parsable {

	public $entity = 'Campaign';

	public $fields = [
	    "ga:goal5ConversionRate"
	];

	public $id = 'goal5conversionrate';

	public $metric = 'goal5conversionrate';

	public $platform = 'analytics';

	public $property = 'ga:goal5ConversionRate';

	public $report = 'GA_DEFAULT';

	public $type = 'percentage';
};
