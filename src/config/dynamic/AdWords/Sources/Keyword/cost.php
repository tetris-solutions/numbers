<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\AdWords\Source\FloatParser_TrivialSum_Parsable_Summable;

return new class extends FloatParser_TrivialSum_Parsable_Summable {
	public $id = "cost";
	public $metric = "cost";
	public $entity = "Keyword";
	public $platform = "adwords";
	public $report = "KEYWORDS_PERFORMANCE_REPORT";
	public $fields = ["Cost"];
	public $property = "Cost";
	public $type = "currency";
};
