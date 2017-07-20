<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\AdWords\Source\AdWordsSourceFloatParserTrivialSumParsableSummable;

return new class extends AdWordsSourceFloatParserTrivialSumParsableSummable {
	public $metric = "benchmarkctr";
	public $entity = "Partition";
	public $platform = "adwords";
	public $report = "PRODUCT_PARTITION_REPORT";
	public $fields = ["BenchmarkCtr"];
};
