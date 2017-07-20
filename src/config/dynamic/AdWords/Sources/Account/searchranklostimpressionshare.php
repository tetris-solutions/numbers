<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\AdWords\Source\AdWordsSourceComplexValueParserParsable;

return new class extends AdWordsSourceComplexValueParserParsable {
	public $metric = "searchranklostimpressionshare";
	public $entity = "Account";
	public $platform = "adwords";
	public $report = "ACCOUNT_PERFORMANCE_REPORT";
	public $fields = ["SearchRankLostImpressionShare","SearchBudgetLostImpressionShare","SearchImpressionShare"];
	public $inferred_from = ["searchimpressionshare","impressions"];
};
