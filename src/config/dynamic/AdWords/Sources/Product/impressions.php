<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\AdWords\Source\AdWordsSourceIntegerParserTrivialSumParsableSummable;

return new class extends AdWordsSourceIntegerParserTrivialSumParsableSummable {
	public $id = "impressions";
	public $metric = "impressions";
	public $entity = "Product";
	public $platform = "adwords";
	public $report = "SHOPPING_PERFORMANCE_REPORT";
	public $fields = ["Impressions"];
	public $property = "Impressions";
	public $type = "integer";
};
