<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\Shared\Metric\Metric_FloatParser_Parsable;

return new class extends Metric_FloatParser_Parsable {

	public $entity = 'Keyword';

	public $fields = [
	    "TopOfPageCpc"
	];

	public $id = 'topofpagecpc';

	public $metric = 'topofpagecpc';

	public $platform = 'adwords';

	public $property = 'TopOfPageCpc';

	public $report = 'KEYWORDS_PERFORMANCE_REPORT';

	public $type = 'currency';
};
