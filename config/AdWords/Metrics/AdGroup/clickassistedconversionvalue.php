<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\Shared\Metric\Metric_FloatParser_TrivialSum_Parsable_Summable;

return new class extends Metric_FloatParser_TrivialSum_Parsable_Summable {

	public $entity = 'AdGroup';

	public $fields = [
	    "ClickAssistedConversionValue"
	];

	public $id = 'clickassistedconversionvalue';

	public $metric = 'clickassistedconversionvalue';

	public $platform = 'adwords';

	public $property = 'ClickAssistedConversionValue';

	public $report = 'ADGROUP_PERFORMANCE_REPORT';

	public $type = 'decimal';
};
