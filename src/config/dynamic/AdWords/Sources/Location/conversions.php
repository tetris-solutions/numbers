<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\AdWords\Source\AdWordsSourceFloatParserTrivialSumParsableSummable;

return new class extends AdWordsSourceFloatParserTrivialSumParsableSummable {
	public $id = "conversions";
	public $metric = "conversions";
	public $entity = "Location";
	public $platform = "adwords";
	public $report = "GEO_PERFORMANCE_REPORT";
	public $fields = ["Conversions"];
	public $property = "Conversions";
	public $type = "decimal";
};
