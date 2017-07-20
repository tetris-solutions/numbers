<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\AdWords\Source\AdWordsSourceFloatParserParsable;

return new class extends AdWordsSourceFloatParserParsable {
	public $id = "costperallconversion";
	public $metric = "costperallconversion";
	public $entity = "Query";
	public $platform = "adwords";
	public $report = "KEYWORDLESS_QUERY_REPORT";
	public $fields = ["CostPerAllConversion"];
	public $property = "CostPerAllConversion";
	public $type = "currency";
	public $inferred_from = ["cost","allconversions"];
};
