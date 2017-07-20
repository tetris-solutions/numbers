<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\AdWords\Source\AdWordsSourceComplexValueParserParsable;

return new class extends AdWordsSourceComplexValueParserParsable {
	public $id = "contentbudgetlostimpressionshare";
	public $metric = "contentbudgetlostimpressionshare";
	public $entity = "Account";
	public $platform = "adwords";
	public $report = "ACCOUNT_PERFORMANCE_REPORT";
	public $property = "ContentBudgetLostImpressionShare";
	public $type = "special";
	public $fields = ["ContentBudgetLostImpressionShare","ContentRankLostImpressionShare","ContentImpressionShare"];
	public $inferred_from = ["contentimpressionshare","impressions"];
};
