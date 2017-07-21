<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\AdWords\Source\Source_IntegerParser_TrivialSum_Parsable_Summable;

return new class extends Source_IntegerParser_TrivialSum_Parsable_Summable {
	public $id = "adgroupcriteriacount";
	public $metric = "adgroupcriteriacount";
	public $entity = "Strategy";
	public $platform = "adwords";
	public $report = "BID_GOAL_PERFORMANCE_REPORT";
	public $fields = ["AdGroupCriteriaCount"];
	public $property = "AdGroupCriteriaCount";
	public $type = "integer";
};
