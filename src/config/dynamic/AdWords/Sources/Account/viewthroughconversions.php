<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\AdWords\Source\Source_IntegerParser_TrivialSum_Parsable_Summable;

return new class extends Source_IntegerParser_TrivialSum_Parsable_Summable {

	public $entity = 'Account';

	public $fields = [
	    "ViewThroughConversions"
	];

	public $id = 'viewthroughconversions';

	public $metric = 'viewthroughconversions';

	public $platform = 'adwords';

	public $property = 'ViewThroughConversions';

	public $report = 'ACCOUNT_PERFORMANCE_REPORT';

	public $type = 'integer';
};
