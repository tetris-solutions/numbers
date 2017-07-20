<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\AdWords\Source\AdWordsSourceFloatParserTrivialSumParsableSummable;

return new class extends AdWordsSourceFloatParserTrivialSumParsableSummable {
	public $id = "costpercurrentmodelattributedconversion";
	public $metric = "costpercurrentmodelattributedconversion";
	public $entity = "Keyword";
	public $platform = "adwords";
	public $report = "KEYWORDS_PERFORMANCE_REPORT";
	public $fields = ["CostPerCurrentModelAttributedConversion"];
	public $property = "CostPerCurrentModelAttributedConversion";
	public $type = "decimal";
};
