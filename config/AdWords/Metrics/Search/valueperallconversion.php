<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\Metric\Metric_FloatParser_RatioSum_Parsable_Summable;

return new class extends Metric_FloatParser_RatioSum_Parsable_Summable {

	public $dividendMetric = 'allconversionvalue';

	public $divisorMetric = 'allconversions';

	public $entity = 'Search';

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

	public $report = 'SEARCH_QUERY_PERFORMANCE_REPORT';

	public $type = 'decimal';
};
