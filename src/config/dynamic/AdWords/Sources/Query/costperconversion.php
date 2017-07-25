<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\Source\Source_FloatParser_RatioSum_Parsable_Summable;

return new class extends Source_FloatParser_RatioSum_Parsable_Summable {

	public $dividendMetric = 'cost';

	public $divisorMetric = 'conversions';

	public $entity = 'Query';

	public $fields = [
	    "CostPerConversion"
	];

	public $id = 'costperconversion';

	public $inferred_from = [
	    "cost",
	    "conversions"
	];

	public $metric = 'costperconversion';

	public $platform = 'adwords';

	public $property = 'CostPerConversion';

	public $report = 'KEYWORDLESS_QUERY_REPORT';

	public $type = 'currency';
};
