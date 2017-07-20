<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\AdWords\Source\AdWordsSourceComplexValueParserParsable;

return new class extends AdWordsSourceComplexValueParserParsable {
	public $metric = "searchbudgetlostimpressionshare";
	public $entity = "Campaign";
	public $platform = "adwords";
	public $report = "CAMPAIGN_PERFORMANCE_REPORT";
	public $fields = ["SearchBudgetLostImpressionShare","SearchRankLostImpressionShare","SearchImpressionShare"];
	public $inferred_from = ["searchimpressionshare","impressions"];
};
