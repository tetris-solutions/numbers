<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\Metric\Metric_IntegerParser_TrivialSum_Parsable_Summable;

return new class extends Metric_IntegerParser_TrivialSum_Parsable_Summable {

	public $entity = 'Campaign';

	public $fields = [
	    "ClickAssistedConversions"
	];

	public $id = 'clickassistedconversions';

	public $metric = 'clickassistedconversions';

	public $platform = 'adwords';

	public $property = 'ClickAssistedConversions';

	public $report = 'CAMPAIGN_PERFORMANCE_REPORT';

	public $type = 'integer';
};
