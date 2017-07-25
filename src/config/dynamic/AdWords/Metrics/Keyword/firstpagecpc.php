<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\Metric\Metric_FloatParser_Parsable;

return new class extends Metric_FloatParser_Parsable {

	public $entity = 'Keyword';

	public $fields = [
	    "FirstPageCpc"
	];

	public $id = 'firstpagecpc';

	public $metric = 'firstpagecpc';

	public $platform = 'adwords';

	public $property = 'FirstPageCpc';

	public $report = 'KEYWORDS_PERFORMANCE_REPORT';

	public $type = 'currency';
};
