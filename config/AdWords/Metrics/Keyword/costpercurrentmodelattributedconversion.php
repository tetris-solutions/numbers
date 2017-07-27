<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\Metric\Metric_FloatParser_TrivialSum_Parsable_Summable;

return new class extends Metric_FloatParser_TrivialSum_Parsable_Summable {

	public $entity = 'Keyword';

	public $fields = [
	    "CostPerCurrentModelAttributedConversion"
	];

	public $id = 'costpercurrentmodelattributedconversion';

	public $metric = 'costpercurrentmodelattributedconversion';

	public $platform = 'adwords';

	public $property = 'CostPerCurrentModelAttributedConversion';

	public $report = 'KEYWORDS_PERFORMANCE_REPORT';

	public $type = 'decimal';
};
