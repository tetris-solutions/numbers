<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\Source\Source_RatioParser_RatioSum_Parsable_Summable;

return new class extends Source_RatioParser_RatioSum_Parsable_Summable {

	public $dividendMetric = 'conversionvalue';

	public $dividendProperty = 'ConversionValue';

	public $divisorMetric = 'cost';

	public $divisorProperty = 'Cost';

	public $entity = 'Query';

	public $fields = [
	    "ConversionValue",
	    "Cost"
	];

	public $id = 'roas';

	public $inferred_from = [
	    "conversionvalue",
	    "cost"
	];

	public $metric = 'roas';

	public $platform = 'adwords';

	public $property = 'Roas';

	public $report = 'KEYWORDLESS_QUERY_REPORT';

	public $type = 'currency';
};
