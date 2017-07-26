<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\Shared\Metric\Metric_FloatParser_RatioSum_Parsable_Summable;

return new class extends Metric_FloatParser_RatioSum_Parsable_Summable {

	public $dividendMetric = 'cost';

	public $divisorMetric = 'clicks';

	public $entity = 'Query';

	public $fields = [
	    "AverageCpc"
	];

	public $id = 'averagecpc';

	public $inferred_from = [
	    "cost",
	    "clicks"
	];

	public $metric = 'averagecpc';

	public $platform = 'adwords';

	public $property = 'AverageCpc';

	public $report = 'KEYWORDLESS_QUERY_REPORT';

	public $type = 'currency';
};
