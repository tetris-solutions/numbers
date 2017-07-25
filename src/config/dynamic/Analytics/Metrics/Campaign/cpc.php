<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\Metric\Metric_FloatParser_Parsable;

return new class extends Metric_FloatParser_Parsable {

	public $entity = 'Campaign';

	public $fields = [
	    "ga:CPC"
	];

	public $id = 'cpc';

	public $metric = 'cpc';

	public $platform = 'analytics';

	public $property = 'ga:CPC';

	public $report = 'GA_DEFAULT';

	public $type = 'currency';
};
