<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\AdWords\Source\AdWordsSourceIntegerParserTrivialSumParsableSummable;

return new class extends AdWordsSourceIntegerParserTrivialSumParsableSummable {
	public $metric = "interactions";
	public $entity = "Account";
	public $platform = "adwords";
	public $report = "ACCOUNT_PERFORMANCE_REPORT";
	public $fields = ["Interactions"];
};
