<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\Shared\Metric\Metric_RatioParser_RatioSum_Parsable_Summable;

return new class extends Metric_RatioParser_RatioSum_Parsable_Summable {

	public $dividendMetric = 'conversionvalue';

	public $dividendProperty = 'ConversionValue';

	public $divisorMetric = 'cost';

	public $divisorProperty = 'Cost';

	public $entity = 'Audience';

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

	public $report = 'AUDIENCE_PERFORMANCE_REPORT';

	public $type = 'currency';
};
