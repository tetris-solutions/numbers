<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\AdWords\Source\AdWordsSourceFloatParserTrivialSumParsableSummable;

return new class extends AdWordsSourceFloatParserTrivialSumParsableSummable {
	public $metric = "cost";
	public $entity = "Product";
	public $platform = "adwords";
	public $report = "SHOPPING_PERFORMANCE_REPORT";
	public $fields = ["Cost"];
};
