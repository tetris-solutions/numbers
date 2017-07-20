<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\AdWords\Source\AdWordsSourceIntegerParserTrivialSumParsableSummable;

return new class extends AdWordsSourceIntegerParserTrivialSumParsableSummable {
	public $id = "activeviewmeasurableimpressions";
	public $metric = "activeviewmeasurableimpressions";
	public $entity = "Audience";
	public $platform = "adwords";
	public $report = "AUDIENCE_PERFORMANCE_REPORT";
	public $fields = ["ActiveViewMeasurableImpressions"];
	public $property = "ActiveViewMeasurableImpressions";
	public $type = "integer";
};
