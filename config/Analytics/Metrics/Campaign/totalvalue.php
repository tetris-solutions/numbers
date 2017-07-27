<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\Shared\Metric\Metric_FloatParser_Parsable;

return new class extends Metric_FloatParser_Parsable {

	public $entity = 'Campaign';

	public $fields = [
	    "ga:totalValue"
	];

	public $id = 'totalvalue';

	public $metric = 'totalvalue';

	public $platform = 'analytics';

	public $property = 'ga:totalValue';

	public $report = 'GA_DEFAULT';

	public $type = 'currency';
};
