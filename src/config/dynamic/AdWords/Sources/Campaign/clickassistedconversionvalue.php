<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\AdWords\Source\AdWordsSourceFloatParserTrivialSumParsableSummable;

return new class extends AdWordsSourceFloatParserTrivialSumParsableSummable {
	public $id = "clickassistedconversionvalue";
	public $metric = "clickassistedconversionvalue";
	public $entity = "Campaign";
	public $platform = "adwords";
	public $report = "CAMPAIGN_PERFORMANCE_REPORT";
	public $fields = ["ClickAssistedConversionValue"];
	public $property = "ClickAssistedConversionValue";
	public $type = "decimal";
};
