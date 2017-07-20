<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\AdWords\Source\AdWordsSourceFloatParserTrivialSumParsableSummable;

return new class extends AdWordsSourceFloatParserTrivialSumParsableSummable {
	public $id = "clickassistedconversionsoverlastclickconversions";
	public $metric = "clickassistedconversionsoverlastclickconversions";
	public $entity = "Keyword";
	public $platform = "adwords";
	public $report = "KEYWORDS_PERFORMANCE_REPORT";
	public $fields = ["ClickAssistedConversionsOverLastClickConversions"];
	public $property = "ClickAssistedConversionsOverLastClickConversions";
	public $type = "decimal";
};
