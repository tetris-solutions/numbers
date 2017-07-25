<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\Source\Source_IntegerParser_TrivialSum_Parsable_Summable;

return new class extends Source_IntegerParser_TrivialSum_Parsable_Summable {

	public $entity = 'Keyword';

	public $fields = [
	    "ClickAssistedConversions"
	];

	public $id = 'clickassistedconversions';

	public $metric = 'clickassistedconversions';

	public $platform = 'adwords';

	public $property = 'ClickAssistedConversions';

	public $report = 'KEYWORDS_PERFORMANCE_REPORT';

	public $type = 'integer';
};
