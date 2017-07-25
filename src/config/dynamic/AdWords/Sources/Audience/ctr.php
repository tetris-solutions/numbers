<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\Source\Source_PercentParser_RatioSum_Parsable_Summable;

return new class extends Source_PercentParser_RatioSum_Parsable_Summable {

	public $dividendMetric = 'clicks';

	public $divisorMetric = 'impressions';

	public $entity = 'Audience';

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

	public $report = 'AUDIENCE_PERFORMANCE_REPORT';

	public $type = 'percentage';
};
