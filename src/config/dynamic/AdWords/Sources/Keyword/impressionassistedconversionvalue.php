<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\AdWords\Source\AdWordsSourceFloatParserTrivialSumParsableSummable;

return new class extends AdWordsSourceFloatParserTrivialSumParsableSummable {
	public $id = "impressionassistedconversionvalue";
	public $metric = "impressionassistedconversionvalue";
	public $entity = "Keyword";
	public $platform = "adwords";
	public $report = "KEYWORDS_PERFORMANCE_REPORT";
	public $fields = ["ImpressionAssistedConversionValue"];
	public $property = "ImpressionAssistedConversionValue";
	public $type = "decimal";
};
