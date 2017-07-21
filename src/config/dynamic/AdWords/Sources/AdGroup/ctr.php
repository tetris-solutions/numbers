<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\AdWords\Source\Source_PercentParser_RatioSum_Parsable_Summable;

return new class extends Source_PercentParser_RatioSum_Parsable_Summable {

	public $dividendMetric = 'clicks';

	public $divisorMetric = 'impressions';

	public $entity = 'AdGroup';

	public $fields = [
	    "Ctr"
	];

	public $id = 'ctr';

	public $inferred_from = [
	    "clicks",
	    "impressions"
	];

	public $metric = 'ctr';

	public $platform = 'adwords';

	public $property = 'Ctr';

	public $report = 'ADGROUP_PERFORMANCE_REPORT';

	public $type = 'percentage';
};
