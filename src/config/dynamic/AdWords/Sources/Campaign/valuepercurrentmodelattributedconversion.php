<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\AdWords\Source\AdWordsSourceFloatParserTrivialSumParsableSummable;

return new class extends AdWordsSourceFloatParserTrivialSumParsableSummable {
	public $id = "valuepercurrentmodelattributedconversion";
	public $metric = "valuepercurrentmodelattributedconversion";
	public $entity = "Campaign";
	public $platform = "adwords";
	public $report = "CAMPAIGN_PERFORMANCE_REPORT";
	public $fields = ["ValuePerCurrentModelAttributedConversion"];
	public $property = "ValuePerCurrentModelAttributedConversion";
	public $type = "decimal";
};
