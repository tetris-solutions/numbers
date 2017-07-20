<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\AdWords\Source\AdWordsSourceFloatParserParsable;

return new class extends AdWordsSourceFloatParserParsable {
	public $id = "costperconversion";
	public $metric = "costperconversion";
	public $entity = "Budget";
	public $platform = "adwords";
	public $report = "BUDGET_PERFORMANCE_REPORT";
	public $fields = ["CostPerConversion"];
	public $property = "CostPerConversion";
	public $type = "currency";
	public $inferred_from = ["cost","conversions"];
};
