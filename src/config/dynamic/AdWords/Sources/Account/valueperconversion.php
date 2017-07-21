<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\AdWords\Source\Source_FloatParser_RatioSum_Parsable_Summable;

return new class extends Source_FloatParser_RatioSum_Parsable_Summable {

	public $dividendMetric = 'conversionvalue';

	public $divisorMetric = 'conversions';

	public $entity = 'Account';

	public $fields = [
	    "ValuePerConversion"
	];

	public $id = 'valueperconversion';

	public $inferred_from = [
	    "conversionvalue",
	    "conversions"
	];

	public $metric = 'valueperconversion';

	public $platform = 'adwords';

	public $property = 'ValuePerConversion';

	public $report = 'ACCOUNT_PERFORMANCE_REPORT';

	public $type = 'decimal';
};
