<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\AdWords\Source\AdWordsSourceFloatParserTrivialSumParsableSummable;

return new class extends AdWordsSourceFloatParserTrivialSumParsableSummable {
	public $id = "offlineinteractionrate";
	public $metric = "offlineinteractionrate";
	public $entity = "AdGroup";
	public $platform = "adwords";
	public $report = "ADGROUP_PERFORMANCE_REPORT";
	public $fields = ["OfflineInteractionRate"];
	public $property = "OfflineInteractionRate";
	public $type = "decimal";
	public $inferred_from = ["numofflineinteractions","numofflineimpressions"];
};
