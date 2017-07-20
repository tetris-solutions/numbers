<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\AdWords\Source\AdWordsSourceFloatParserTrivialSumParsableSummable;

return new class extends AdWordsSourceFloatParserTrivialSumParsableSummable {
	public $id = "valueperconversion";
	public $metric = "valueperconversion";
	public $entity = "Budget";
	public $platform = "adwords";
	public $report = "BUDGET_PERFORMANCE_REPORT";
	public $fields = ["ValuePerConversion"];
	public $property = "ValuePerConversion";
	public $type = "decimal";
	public $inferred_from = ["conversionvalue","conversions"];
};
