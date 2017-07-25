<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\Source\Source_PercentParser_RatioSum_Parsable_Summable;

return new class extends Source_PercentParser_RatioSum_Parsable_Summable {

	public $dividendMetric = 'invalidclicks';

	public $divisorMetric = 'clicks';

	public $entity = 'Campaign';

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

	public $report = 'CAMPAIGN_PERFORMANCE_REPORT';

	public $type = 'percentage';
};
