<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\Source\Source_PercentParser_RatioSum_Parsable_Summable;

return new class extends Source_PercentParser_RatioSum_Parsable_Summable {

	public $dividendMetric = 'allconversions';

	public $divisorMetric = 'clicks';

	public $entity = 'Account';

	public $fields = [
	    "AllConversionRate"
	];

	public $id = 'allconversionrate';

	public $inferred_from = [
	    "allconversions",
	    "clicks"
	];

	public $metric = 'allconversionrate';

	public $platform = 'adwords';

	public $property = 'AllConversionRate';

	public $report = 'ACCOUNT_PERFORMANCE_REPORT';

	public $type = 'percentage';
};
