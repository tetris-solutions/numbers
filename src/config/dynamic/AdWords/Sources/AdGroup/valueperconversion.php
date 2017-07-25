<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\Source\Source_FloatParser_RatioSum_Parsable_Summable;

return new class extends Source_FloatParser_RatioSum_Parsable_Summable {

	public $dividendMetric = 'conversionvalue';

	public $divisorMetric = 'conversions';

	public $entity = 'AdGroup';

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

	public $report = 'ADGROUP_PERFORMANCE_REPORT';

	public $type = 'decimal';
};
