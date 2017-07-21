<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\AdWords\Source\Source_PercentParser_RatioSum_Parsable_Summable;

return new class extends Source_PercentParser_RatioSum_Parsable_Summable {

	public $dividendMetric = 'clicks';

	public $divisorMetric = 'impressions';

	public $entity = 'Query';

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

	public $report = 'KEYWORDLESS_QUERY_REPORT';

	public $type = 'percentage';
};
