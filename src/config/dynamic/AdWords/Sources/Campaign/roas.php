<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\AdWords\Source\Source_RatioParser_RatioSum_Parsable_Summable;

return new class extends Source_RatioParser_RatioSum_Parsable_Summable {

	public $dividendMetric = 'conversionvalue';

	public $dividendProperty = 'ConversionValue';

	public $divisorMetric = 'cost';

	public $divisorProperty = 'Cost';

	public $entity = 'Campaign';

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

	public $report = 'CAMPAIGN_PERFORMANCE_REPORT';

	public $type = 'currency';
};
