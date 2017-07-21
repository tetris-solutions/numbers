<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\AdWords\Source\IntegerParser_TrivialSum_Parsable_Summable;

return new class extends IntegerParser_TrivialSum_Parsable_Summable {
	public $id = "viewthroughconversions";
	public $metric = "viewthroughconversions";
	public $entity = "Strategy";
	public $platform = "adwords";
	public $report = "BID_GOAL_PERFORMANCE_REPORT";
	public $fields = ["ViewThroughConversions"];
	public $property = "ViewThroughConversions";
	public $type = "integer";
};
