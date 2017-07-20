<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\AdWords\Source\AdWordsSourceIntegerParserTrivialSumParsableSummable;

return new class extends AdWordsSourceIntegerParserTrivialSumParsableSummable {
	public $metric = "activeviewmeasurableimpressions";
	public $entity = "Audience";
	public $platform = "adwords";
	public $report = "AUDIENCE_PERFORMANCE_REPORT";
	public $fields = ["ActiveViewMeasurableImpressions"];
};
