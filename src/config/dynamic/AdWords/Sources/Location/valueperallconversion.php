<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\AdWords\Source\AdWordsSourceFloatParserTrivialSumParsableSummable;

return new class extends AdWordsSourceFloatParserTrivialSumParsableSummable {
	public $id = "valueperallconversion";
	public $metric = "valueperallconversion";
	public $entity = "Location";
	public $platform = "adwords";
	public $report = "GEO_PERFORMANCE_REPORT";
	public $fields = ["ValuePerAllConversion"];
	public $property = "ValuePerAllConversion";
	public $type = "decimal";
	public $inferred_from = ["allconversionvalue","allconversions"];
};
