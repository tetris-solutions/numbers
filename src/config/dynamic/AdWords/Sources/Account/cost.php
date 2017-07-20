<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\AdWords\Source\AdWordsSourceFloatParserTrivialSumParsableSummable;

return new class extends AdWordsSourceFloatParserTrivialSumParsableSummable {
	public $id = "cost";
	public $metric = "cost";
	public $entity = "Account";
	public $platform = "adwords";
	public $report = "ACCOUNT_PERFORMANCE_REPORT";
	public $fields = ["Cost"];
	public $property = "Cost";
	public $type = "currency";
};
