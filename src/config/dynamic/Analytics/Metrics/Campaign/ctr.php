<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\Metric\Metric_PercentParser_Parsable;

return new class extends Metric_PercentParser_Parsable {

	public $entity = 'Campaign';

	public $fields = [
	    "ga:CTR"
	];

	public $id = 'ctr';

	public $metric = 'ctr';

	public $platform = 'analytics';

	public $property = 'ga:CTR';

	public $report = 'GA_DEFAULT';

	public $type = 'percentage';
};
