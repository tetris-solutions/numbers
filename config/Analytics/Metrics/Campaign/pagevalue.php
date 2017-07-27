<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\Shared\Metric\Metric_FloatParser_Parsable;

return new class extends Metric_FloatParser_Parsable {

	public $entity = 'Campaign';

	public $fields = [
	    "ga:pageValue"
	];

	public $id = 'pagevalue';

	public $metric = 'pagevalue';

	public $platform = 'analytics';

	public $property = 'ga:pageValue';

	public $report = 'GA_DEFAULT';

	public $type = 'currency';
};
