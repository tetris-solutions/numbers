<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\AdWords\Source\AdWordsSourceFloatParserTrivialSumParsableSummable;

return new class extends AdWordsSourceFloatParserTrivialSumParsableSummable {
	public $id = "currentmodelattributedconversionvalue";
	public $metric = "currentmodelattributedconversionvalue";
	public $entity = "Campaign";
	public $platform = "adwords";
	public $report = "CAMPAIGN_PERFORMANCE_REPORT";
	public $fields = ["CurrentModelAttributedConversionValue"];
	public $property = "CurrentModelAttributedConversionValue";
	public $type = "decimal";
};
