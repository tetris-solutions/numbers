<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\AdWords\Source\AdWordsSourceComplexValueParserParsable;

return new class extends AdWordsSourceComplexValueParserParsable {
	public $metric = "contentbudgetlostimpressionshare";
	public $entity = "Campaign";
	public $platform = "adwords";
	public $report = "CAMPAIGN_PERFORMANCE_REPORT";
	public $fields = ["ContentBudgetLostImpressionShare","ContentRankLostImpressionShare","ContentImpressionShare"];
	public $inferred_from = ["contentimpressionshare","impressions"];
};
