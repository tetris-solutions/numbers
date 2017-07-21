<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\AdWords\Source\IntegerParser_TrivialSum_Parsable_Summable;

return new class extends IntegerParser_TrivialSum_Parsable_Summable {
	public $id = "estimatedaddclicksatfirstpositioncpc";
	public $metric = "estimatedaddclicksatfirstpositioncpc";
	public $entity = "Keyword";
	public $platform = "adwords";
	public $report = "KEYWORDS_PERFORMANCE_REPORT";
	public $fields = ["EstimatedAddClicksAtFirstPositionCpc"];
	public $property = "EstimatedAddClicksAtFirstPositionCpc";
	public $type = "integer";
};
