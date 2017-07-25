<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\Metric\Metric_PercentParser_RatioSum_Parsable_Summable;

return new class extends Metric_PercentParser_RatioSum_Parsable_Summable {

	public $dividendMetric = 'invalidclicks';

	public $divisorMetric = 'clicks';

	public $entity = 'Account';

	public $fields = [
	    "InvalidClickRate"
	];

	public $id = 'invalidclickrate';

	public $inferred_from = [
	    "invalidclicks",
	    "clicks"
	];

	public $metric = 'invalidclickrate';

	public $platform = 'adwords';

	public $property = 'InvalidClickRate';

	public $report = 'ACCOUNT_PERFORMANCE_REPORT';

	public $type = 'percentage';
};
