<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\AdWords\Source\AdWordsSourceFloatParserParsable;

return new class extends AdWordsSourceFloatParserParsable {
	public $id = "costperconversion";
	public $metric = "costperconversion";
	public $entity = "Audience";
	public $platform = "adwords";
	public $report = "AUDIENCE_PERFORMANCE_REPORT";
	public $fields = ["CostPerConversion"];
	public $property = "CostPerConversion";
	public $type = "currency";
	public $inferred_from = ["cost","conversions"];
};
