<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\AdWords\Source\AdWordsSourceFloatParserParsable;

return new class extends AdWordsSourceFloatParserParsable {
	public $id = "averagecost";
	public $metric = "averagecost";
	public $entity = "AdGroup";
	public $platform = "adwords";
	public $report = "ADGROUP_PERFORMANCE_REPORT";
	public $fields = ["AverageCost"];
	public $property = "AverageCost";
	public $type = "currency";
	public $inferred_from = ["cost","interactions"];
};
