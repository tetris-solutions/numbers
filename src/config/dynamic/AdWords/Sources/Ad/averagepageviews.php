<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\AdWords\Source\AdWordsSourceFloatParserTrivialSumParsableSummable;

return new class extends AdWordsSourceFloatParserTrivialSumParsableSummable {
	public $id = "averagepageviews";
	public $metric = "averagepageviews";
	public $entity = "Ad";
	public $platform = "adwords";
	public $report = "AD_PERFORMANCE_REPORT";
	public $fields = ["AveragePageviews"];
	public $property = "AveragePageviews";
	public $type = "decimal";
};
