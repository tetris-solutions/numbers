<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\Source\Source_FloatParser_TrivialSum_Parsable_Summable;

return new class extends Source_FloatParser_TrivialSum_Parsable_Summable {

	public $entity = 'Audience';

	public $fields = [
	    "AllConversions"
	];

	public $id = 'allconversions';

	public $metric = 'allconversions';

	public $platform = 'adwords';

	public $property = 'AllConversions';

	public $report = 'AUDIENCE_PERFORMANCE_REPORT';

	public $type = 'decimal';
};
