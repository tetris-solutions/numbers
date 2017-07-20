<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\AdWords\Source\AdWordsSourceFloatParserTrivialSumParsableSummable;

return new class extends AdWordsSourceFloatParserTrivialSumParsableSummable {
	public $id = "impressionassistedconversionsoverlastclickconversions";
	public $metric = "impressionassistedconversionsoverlastclickconversions";
	public $entity = "Keyword";
	public $platform = "adwords";
	public $report = "KEYWORDS_PERFORMANCE_REPORT";
	public $fields = ["ImpressionAssistedConversionsOverLastClickConversions"];
	public $property = "ImpressionAssistedConversionsOverLastClickConversions";
	public $type = "decimal";
};
