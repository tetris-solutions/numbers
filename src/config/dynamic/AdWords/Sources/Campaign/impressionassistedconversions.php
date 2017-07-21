<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\AdWords\Source\Source_IntegerParser_TrivialSum_Parsable_Summable;

return new class extends Source_IntegerParser_TrivialSum_Parsable_Summable {

	public $entity = 'Campaign';

	public $fields = [
	    "ImpressionAssistedConversions"
	];

	public $id = 'impressionassistedconversions';

	public $metric = 'impressionassistedconversions';

	public $platform = 'adwords';

	public $property = 'ImpressionAssistedConversions';

	public $report = 'CAMPAIGN_PERFORMANCE_REPORT';

	public $type = 'integer';
};
