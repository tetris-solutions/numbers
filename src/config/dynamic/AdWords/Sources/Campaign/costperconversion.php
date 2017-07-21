<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\AdWords\Source\Source_FloatParser_RatioSum_Parsable_Summable;

return new class extends Source_FloatParser_RatioSum_Parsable_Summable {

	public $dividendMetric = 'cost';

	public $divisorMetric = 'conversions';

	public $entity = 'Campaign';

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

	public $report = 'CAMPAIGN_PERFORMANCE_REPORT';

	public $type = 'currency';
};
