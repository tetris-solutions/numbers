<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\Shared\Metric\Metric_FloatParser_Parsable;

return new class extends Metric_FloatParser_Parsable {

	public $entity = 'Campaign';

	public $fields = [
	    "ga:pageviewsPerSession"
	];

	public $id = 'pageviewspersession';

	public $metric = 'pageviewspersession';

	public $platform = 'analytics';

	public $property = 'ga:pageviewsPerSession';

	public $report = 'GA_DEFAULT';

	public $type = 'decimal';
};
