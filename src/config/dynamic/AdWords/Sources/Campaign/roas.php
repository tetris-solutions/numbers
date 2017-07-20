<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\AdWords\Source\AdWordsSourceFloatParserParsable;

return new class extends AdWordsSourceFloatParserParsable {
	public $metric = "roas";
	public $entity = "Campaign";
	public $platform = "adwords";
	public $report = "CAMPAIGN_PERFORMANCE_REPORT";
	public $fields = ["ConversionValue","Cost"];
	public $inferred_from = ["conversionvalue","cost"];
};
