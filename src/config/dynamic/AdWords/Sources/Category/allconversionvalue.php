<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\AdWords\Source\AdWordsSourceFloatParserTrivialSumParsableSummable;

return new class extends AdWordsSourceFloatParserTrivialSumParsableSummable {
	public $metric = "allconversionvalue";
	public $entity = "Category";
	public $platform = "adwords";
	public $report = "KEYWORDLESS_CATEGORY_REPORT";
	public $fields = ["AllConversionValue"];
};
