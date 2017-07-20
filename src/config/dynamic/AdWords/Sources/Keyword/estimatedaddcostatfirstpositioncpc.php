<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\AdWords\Source\AdWordsSourceFloatParserParsable;

return new class extends AdWordsSourceFloatParserParsable {
	public $id = "estimatedaddcostatfirstpositioncpc";
	public $metric = "estimatedaddcostatfirstpositioncpc";
	public $entity = "Keyword";
	public $platform = "adwords";
	public $report = "KEYWORDS_PERFORMANCE_REPORT";
	public $fields = ["EstimatedAddCostAtFirstPositionCpc"];
	public $property = "EstimatedAddCostAtFirstPositionCpc";
	public $type = "currency";
};
