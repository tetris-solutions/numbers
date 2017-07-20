<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\AdWords\Source\AdWordsSourcePercentParserParsable;

return new class extends AdWordsSourcePercentParserParsable {
	public $id = "percentnewvisitors";
	public $metric = "percentnewvisitors";
	public $entity = "AdGroup";
	public $platform = "adwords";
	public $report = "ADGROUP_PERFORMANCE_REPORT";
	public $fields = ["PercentNewVisitors"];
	public $property = "PercentNewVisitors";
	public $type = "percentage";
};
