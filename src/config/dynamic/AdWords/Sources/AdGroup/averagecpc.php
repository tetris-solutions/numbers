<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\AdWords\Source\AdWordsSourceFloatParserParsable;

return new class extends AdWordsSourceFloatParserParsable {
	public $id = "averagecpc";
	public $metric = "averagecpc";
	public $entity = "AdGroup";
	public $platform = "adwords";
	public $report = "ADGROUP_PERFORMANCE_REPORT";
	public $fields = ["AverageCpc"];
	public $property = "AverageCpc";
	public $type = "currency";
	public $inferred_from = ["cost","clicks"];
};
