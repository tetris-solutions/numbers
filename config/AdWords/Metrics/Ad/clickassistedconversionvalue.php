<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\Metric\Metric_FloatParser_TrivialSum_Parsable_Summable;

return new class extends Metric_FloatParser_TrivialSum_Parsable_Summable {

	public $entity = 'Ad';

	public $fields = [
	    "ClickAssistedConversionValue"
	];

	public $id = 'clickassistedconversionvalue';

	public $metric = 'clickassistedconversionvalue';

	public $platform = 'adwords';

	public $property = 'ClickAssistedConversionValue';

	public $report = 'AD_PERFORMANCE_REPORT';

	public $type = 'decimal';
};
