<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\AdWords\Source\AdWordsSourceFloatParserTrivialSumParsableSummable;

return new class extends AdWordsSourceFloatParserTrivialSumParsableSummable {
	public $id = "impressionassistedconversionsoverlastclickconversions";
	public $metric = "impressionassistedconversionsoverlastclickconversions";
	public $entity = "AdGroup";
	public $platform = "adwords";
	public $report = "ADGROUP_PERFORMANCE_REPORT";
	public $fields = ["ImpressionAssistedConversionsOverLastClickConversions"];
	public $property = "ImpressionAssistedConversionsOverLastClickConversions";
	public $type = "decimal";
};
