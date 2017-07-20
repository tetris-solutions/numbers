<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\AdWords\Source\AdWordsSourcePercentParserParsable;

return new class extends AdWordsSourcePercentParserParsable {
	public $id = "interactionrate";
	public $metric = "interactionrate";
	public $entity = "Audience";
	public $platform = "adwords";
	public $report = "AUDIENCE_PERFORMANCE_REPORT";
	public $fields = ["InteractionRate"];
	public $property = "InteractionRate";
	public $type = "percentage";
	public $inferred_from = ["interactions","impressions"];
};
