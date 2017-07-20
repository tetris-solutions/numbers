<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\AdWords\Source\AdWordsSourcePercentParserParsable;

return new class extends AdWordsSourcePercentParserParsable {
	public $metric = "ctr";
	public $entity = "Product";
	public $platform = "adwords";
	public $report = "SHOPPING_PERFORMANCE_REPORT";
	public $fields = ["Ctr"];
	public $inferred_from = ["clicks","impressions"];
};
