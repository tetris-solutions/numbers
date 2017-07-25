<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\Source\Source_IntegerParser_TrivialSum_Parsable_Summable;

return new class extends Source_IntegerParser_TrivialSum_Parsable_Summable {

	public $entity = 'AdGroup';

	public $fields = [
	    "NumOfflineInteractions"
	];

	public $id = 'numofflineinteractions';

	public $metric = 'numofflineinteractions';

	public $platform = 'adwords';

	public $property = 'NumOfflineInteractions';

	public $report = 'ADGROUP_PERFORMANCE_REPORT';

	public $type = 'integer';
};
