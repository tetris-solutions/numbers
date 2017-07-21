<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\AdWords\Source\Source_IntegerParser_TrivialSum_Parsable_Summable;

return new class extends Source_IntegerParser_TrivialSum_Parsable_Summable {

	public $entity = 'AdGroup';

	public $fields = [
	    "ClickAssistedConversions"
	];

	public $id = 'clickassistedconversions';

	public $metric = 'clickassistedconversions';

	public $platform = 'adwords';

	public $property = 'ClickAssistedConversions';

	public $report = 'ADGROUP_PERFORMANCE_REPORT';

	public $type = 'integer';
};
