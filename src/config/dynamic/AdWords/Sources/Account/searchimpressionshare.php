<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\AdWords\Source\AdWordsSourceComplexValueParserParsable;

return new class extends AdWordsSourceComplexValueParserParsable {
	public $metric = "searchimpressionshare";
	public $entity = "Account";
	public $platform = "adwords";
	public $report = "ACCOUNT_PERFORMANCE_REPORT";
	public $fields = ["SearchImpressionShare","SearchBudgetLostImpressionShare","SearchRankLostImpressionShare"];
	public $inferred_from = ["impressions"];
};
