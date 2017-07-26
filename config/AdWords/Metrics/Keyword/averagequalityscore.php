<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\Shared\Metric\Metric_FloatParser_WeightedSum_Parsable_Summable;

return new class extends Metric_FloatParser_WeightedSum_Parsable_Summable {

	public $entity = 'Keyword';

	public $fields = [
	    "QualityScore"
	];

	public $id = 'averagequalityscore';

	public $inferred_from = [
	    "impressions"
	];

	public $metric = 'averagequalityscore';

	public $platform = 'adwords';

	public $property = 'QualityScore';

	public $report = 'KEYWORDS_PERFORMANCE_REPORT';

	public $type = 'decimal';

	public $weightMetric = 'impressions';
};
