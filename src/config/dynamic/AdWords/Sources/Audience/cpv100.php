<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\AdWords\Source\Source_CPV100Parser_CPV100Sum_Parsable_Summable;

return new class extends Source_CPV100Parser_CPV100Sum_Parsable_Summable {

	public $costMetric = 'cost';

	public $costProperty = 'Cost';

	public $entity = 'Audience';

	public $fields = [
	    "Cost",
	    "VideoQuartile100Rate",
	    "VideoViews"
	];

	public $id = 'cpv100';

	public $inferred_from = [
	    "cost",
	    "videoquartile100rate",
	    "videoviews"
	];

	public $metric = 'cpv100';

	public $platform = 'adwords';

	public $property = 'Cpv100';

	public $report = 'AUDIENCE_PERFORMANCE_REPORT';

	public $type = 'currency';

	public $views100PercentileMetric = 'videoquartile100rate';

	public $views100PercentileProperty = 'VideoQuartile100Rate';

	public $viewsMetric = 'videoviews';

	public $viewsProperty = 'VideoViews';
};
