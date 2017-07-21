<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\AdWords\Source\Source_IntegerParser_TrivialSum_Parsable_Summable;

return new class extends Source_IntegerParser_TrivialSum_Parsable_Summable {

	public $entity = 'Ad';

	public $fields = [
	    "ActiveViewImpressions"
	];

	public $id = 'activeviewimpressions';

	public $metric = 'activeviewimpressions';

	public $platform = 'adwords';

	public $property = 'ActiveViewImpressions';

	public $report = 'AD_PERFORMANCE_REPORT';

	public $type = 'integer';
};
