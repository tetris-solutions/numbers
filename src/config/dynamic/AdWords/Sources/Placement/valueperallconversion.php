<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\AdWords\Source\AdWordsSourceFloatParserTrivialSumParsableSummable;

return new class extends AdWordsSourceFloatParserTrivialSumParsableSummable {
	public $id = "valueperallconversion";
	public $metric = "valueperallconversion";
	public $entity = "Placement";
	public $platform = "adwords";
	public $report = "AUTOMATIC_PLACEMENTS_PERFORMANCE_REPORT";
	public $fields = ["ValuePerAllConversion"];
	public $property = "ValuePerAllConversion";
	public $type = "decimal";
	public $inferred_from = ["allconversionvalue","allconversions"];
};
