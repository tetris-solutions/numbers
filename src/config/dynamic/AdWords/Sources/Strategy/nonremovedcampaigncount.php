<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\AdWords\Source\AdWordsSourceIntegerParserTrivialSumParsableSummable;

return new class extends AdWordsSourceIntegerParserTrivialSumParsableSummable {
	public $metric = "nonremovedcampaigncount";
	public $entity = "Strategy";
	public $platform = "adwords";
	public $report = "BID_GOAL_PERFORMANCE_REPORT";
	public $fields = ["NonRemovedCampaignCount"];
};
