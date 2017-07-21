<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\AdWords\Source\Source_IntegerParser_TrivialSum_Parsable_Summable;

return new class extends Source_IntegerParser_TrivialSum_Parsable_Summable {

	public $entity = 'Campaign';

	public $fields = [
	    "Clicks"
	];

	public $id = 'clicks';

	public $metric = 'clicks';

	public $platform = 'adwords';

	public $property = 'Clicks';

	public $report = 'CAMPAIGN_PERFORMANCE_REPORT';

	public $type = 'integer';
};
