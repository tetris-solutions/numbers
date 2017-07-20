<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\AdWords\Source\AdWordsSourcePercentParserParsable;

return new class extends AdWordsSourcePercentParserParsable {
	public $metric = "interactionrate";
	public $entity = "AdGroup";
	public $platform = "adwords";
	public $report = "ADGROUP_PERFORMANCE_REPORT";
	public $fields = ["InteractionRate"];
	public $inferred_from = ["interactions","impressions"];
};
