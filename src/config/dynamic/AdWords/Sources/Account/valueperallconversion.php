<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\Source\Source_FloatParser_RatioSum_Parsable_Summable;

return new class extends Source_FloatParser_RatioSum_Parsable_Summable {

	public $dividendMetric = 'allconversionvalue';

	public $divisorMetric = 'allconversions';

	public $entity = 'Account';

	public $fields = [
	    "ValuePerAllConversion"
	];

	public $id = 'valueperallconversion';

	public $inferred_from = [
	    "allconversionvalue",
	    "allconversions"
	];

	public $metric = 'valueperallconversion';

	public $platform = 'adwords';

	public $property = 'ValuePerAllConversion';

	public $report = 'ACCOUNT_PERFORMANCE_REPORT';

	public $type = 'decimal';
};
