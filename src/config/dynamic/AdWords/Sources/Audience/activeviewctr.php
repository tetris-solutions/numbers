<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\AdWords\Source\AdWordsSourceFloatParserTrivialSumParsableSummable;

return new class extends AdWordsSourceFloatParserTrivialSumParsableSummable {
	public $metric = "activeviewctr";
	public $entity = "Audience";
	public $platform = "adwords";
	public $report = "AUDIENCE_PERFORMANCE_REPORT";
	public $fields = ["ActiveViewCtr"];
};
