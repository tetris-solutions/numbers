<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\Source\Source_FloatParser_TrivialSum_Parsable_Summable;

return new class extends Source_FloatParser_TrivialSum_Parsable_Summable {

	public $entity = 'Campaign';

	public $fields = [
	    "ConversionValue"
	];

	public $id = 'conversionvalue';

	public $metric = 'conversionvalue';

	public $platform = 'adwords';

	public $property = 'ConversionValue';

	public $report = 'CAMPAIGN_PERFORMANCE_REPORT';

	public $type = 'decimal';
};
