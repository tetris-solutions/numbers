<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\AdWords\Source\AdWordsSourcePercentParserParsable;

return new class extends AdWordsSourcePercentParserParsable {
	public $id = "ctr";
	public $metric = "ctr";
	public $entity = "AdGroup";
	public $platform = "adwords";
	public $report = "ADGROUP_PERFORMANCE_REPORT";
	public $fields = ["Ctr"];
	public $property = "Ctr";
	public $type = "percentage";
	public $inferred_from = ["clicks","impressions"];
};
