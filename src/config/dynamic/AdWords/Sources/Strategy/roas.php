<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\AdWords\Source\AdWordsSourceFloatParserParsable;

return new class extends AdWordsSourceFloatParserParsable {
	public $id = "roas";
	public $metric = "roas";
	public $entity = "Strategy";
	public $platform = "adwords";
	public $report = "BID_GOAL_PERFORMANCE_REPORT";
	public $property = "Roas";
	public $type = "currency";
	public $fields = ["ConversionValue","Cost"];
	public $inferred_from = ["conversionvalue","cost"];
};
