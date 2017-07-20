<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\AdWords\Source\AdWordsSourcePercentParserParsable;

return new class extends AdWordsSourcePercentParserParsable {
	public $id = "interactionrate";
	public $metric = "interactionrate";
	public $entity = "Placement";
	public $platform = "adwords";
	public $report = "AUTOMATIC_PLACEMENTS_PERFORMANCE_REPORT";
	public $fields = ["InteractionRate"];
	public $property = "InteractionRate";
	public $type = "percentage";
	public $inferred_from = ["interactions","impressions"];
};
