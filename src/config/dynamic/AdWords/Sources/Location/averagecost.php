<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\AdWords\Source\AdWordsSourceFloatParserParsable;

return new class extends AdWordsSourceFloatParserParsable {
	public $id = "averagecost";
	public $metric = "averagecost";
	public $entity = "Location";
	public $platform = "adwords";
	public $report = "GEO_PERFORMANCE_REPORT";
	public $fields = ["AverageCost"];
	public $property = "AverageCost";
	public $type = "currency";
	public $inferred_from = ["cost","interactions"];
};
