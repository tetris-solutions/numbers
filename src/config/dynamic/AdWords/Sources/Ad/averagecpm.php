<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\AdWords\Source\AdWordsSourceFloatParserParsable;

return new class extends AdWordsSourceFloatParserParsable {
	public $id = "averagecpm";
	public $metric = "averagecpm";
	public $entity = "Ad";
	public $platform = "adwords";
	public $report = "AD_PERFORMANCE_REPORT";
	public $fields = ["AverageCpm"];
	public $property = "AverageCpm";
	public $type = "currency";
	public $inferred_from = ["cost","impressions"];
};
