<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\AdWords\Source\AdWordsSourceFloatParserParsable;

return new class extends AdWordsSourceFloatParserParsable {
	public $id = "averagecpv";
	public $metric = "averagecpv";
	public $entity = "Account";
	public $platform = "adwords";
	public $report = "ACCOUNT_PERFORMANCE_REPORT";
	public $fields = ["AverageCpv"];
	public $property = "AverageCpv";
	public $type = "currency";
	public $inferred_from = ["cost","videoviews"];
};
