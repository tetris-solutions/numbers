<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\AdWords\Source\AdWordsSourceFloatParserTrivialSumParsableSummable;

return new class extends AdWordsSourceFloatParserTrivialSumParsableSummable {
	public $id = "impressionassistedconversionsoverlastclickconversions";
	public $metric = "impressionassistedconversionsoverlastclickconversions";
	public $entity = "Campaign";
	public $platform = "adwords";
	public $report = "CAMPAIGN_PERFORMANCE_REPORT";
	public $fields = ["ImpressionAssistedConversionsOverLastClickConversions"];
	public $property = "ImpressionAssistedConversionsOverLastClickConversions";
	public $type = "decimal";
};
