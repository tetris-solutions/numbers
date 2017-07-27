<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\Metric\Metric_FloatParser_Parsable;

return new class extends Metric_FloatParser_Parsable {

	public $entity = 'Campaign';

	public $fields = [
	    "ga:transactionRevenue"
	];

	public $id = 'transactionrevenue';

	public $metric = 'transactionrevenue';

	public $platform = 'analytics';

	public $property = 'ga:transactionRevenue';

	public $report = 'GA_DEFAULT';

	public $type = 'currency';
};
