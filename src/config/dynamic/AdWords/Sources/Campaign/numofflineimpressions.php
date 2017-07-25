<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\Source\Source_IntegerParser_TrivialSum_Parsable_Summable;

return new class extends Source_IntegerParser_TrivialSum_Parsable_Summable {

	public $entity = 'Campaign';

	public $fields = [
	    "NumOfflineImpressions"
	];

	public $id = 'numofflineimpressions';

	public $metric = 'numofflineimpressions';

	public $platform = 'adwords';

	public $property = 'NumOfflineImpressions';

	public $report = 'CAMPAIGN_PERFORMANCE_REPORT';

	public $type = 'integer';
};
