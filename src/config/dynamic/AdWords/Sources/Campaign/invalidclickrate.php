<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\AdWords\Source\AdWordsSourcePercentParserParsable;

return new class extends AdWordsSourcePercentParserParsable {
	public $id = "invalidclickrate";
	public $metric = "invalidclickrate";
	public $entity = "Campaign";
	public $platform = "adwords";
	public $report = "CAMPAIGN_PERFORMANCE_REPORT";
	public $fields = ["InvalidClickRate"];
	public $property = "InvalidClickRate";
	public $type = "percentage";
	public $inferred_from = ["invalidclicks","clicks"];
};
