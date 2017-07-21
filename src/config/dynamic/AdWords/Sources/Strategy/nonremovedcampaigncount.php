<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\AdWords\Source\Source_IntegerParser_TrivialSum_Parsable_Summable;

return new class extends Source_IntegerParser_TrivialSum_Parsable_Summable {

	public $entity = 'Strategy';

	public $fields = [
	    "NonRemovedCampaignCount"
	];

	public $id = 'nonremovedcampaigncount';

	public $metric = 'nonremovedcampaigncount';

	public $platform = 'adwords';

	public $property = 'NonRemovedCampaignCount';

	public $report = 'BID_GOAL_PERFORMANCE_REPORT';

	public $type = 'integer';
};
