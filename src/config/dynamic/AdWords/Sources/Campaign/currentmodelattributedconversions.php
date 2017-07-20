<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\AdWords\Source\AdWordsSourceFloatParserTrivialSumParsableSummable;

return new class extends AdWordsSourceFloatParserTrivialSumParsableSummable {
	public $id = "currentmodelattributedconversions";
	public $metric = "currentmodelattributedconversions";
	public $entity = "Campaign";
	public $platform = "adwords";
	public $report = "CAMPAIGN_PERFORMANCE_REPORT";
	public $fields = ["CurrentModelAttributedConversions"];
	public $property = "CurrentModelAttributedConversions";
	public $type = "decimal";
};
