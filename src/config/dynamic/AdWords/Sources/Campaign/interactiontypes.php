<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\AdWords\Source\AdWordsSourceRawParserParsable;

return new class extends AdWordsSourceRawParserParsable {
	public $id = "interactiontypes";
	public $metric = "interactiontypes";
	public $entity = "Campaign";
	public $platform = "adwords";
	public $report = "CAMPAIGN_PERFORMANCE_REPORT";
	public $fields = ["InteractionTypes"];
	public $property = "InteractionTypes";
	public $type = "raw";
};
