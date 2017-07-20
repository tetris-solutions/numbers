<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\AdWords\Source\AdWordsSourcePercentParserParsable;

return new class extends AdWordsSourcePercentParserParsable {
	public $metric = "ctr";
	public $entity = "Keyword";
	public $platform = "adwords";
	public $report = "KEYWORDS_PERFORMANCE_REPORT";
	public $fields = ["Ctr"];
	public $inferred_from = ["clicks","impressions"];
};
