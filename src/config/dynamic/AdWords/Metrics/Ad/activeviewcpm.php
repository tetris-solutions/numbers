<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\Metric\Metric_FloatParser_Parsable;

return new class extends Metric_FloatParser_Parsable {

	public $entity = 'Ad';

	public $fields = [
	    "ActiveViewCpm"
	];

	public $id = 'activeviewcpm';

	public $metric = 'activeviewcpm';

	public $platform = 'adwords';

	public $property = 'ActiveViewCpm';

	public $report = 'AD_PERFORMANCE_REPORT';

	public $type = 'currency';
};
