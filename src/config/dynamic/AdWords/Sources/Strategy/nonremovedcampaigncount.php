<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\AdWords\Source\Source_IntegerParser_TrivialSum_Parsable_Summable;

return new class extends Source_IntegerParser_TrivialSum_Parsable_Summable {
	public $id = "nonremovedcampaigncount";
	public $metric = "nonremovedcampaigncount";
	public $entity = "Strategy";
	public $platform = "adwords";
	public $report = "BID_GOAL_PERFORMANCE_REPORT";
	public $fields = ["NonRemovedCampaignCount"];
	public $property = "NonRemovedCampaignCount";
	public $type = "integer";
};
