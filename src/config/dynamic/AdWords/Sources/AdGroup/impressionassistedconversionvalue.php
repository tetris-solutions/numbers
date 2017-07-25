<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\Source\Source_FloatParser_TrivialSum_Parsable_Summable;

return new class extends Source_FloatParser_TrivialSum_Parsable_Summable {

	public $entity = 'AdGroup';

	public $fields = [
	    "ImpressionAssistedConversionValue"
	];

	public $id = 'impressionassistedconversionvalue';

	public $metric = 'impressionassistedconversionvalue';

	public $platform = 'adwords';

	public $property = 'ImpressionAssistedConversionValue';

	public $report = 'ADGROUP_PERFORMANCE_REPORT';

	public $type = 'decimal';
};
