<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\AdWords\Source\AdWordsSourceRawParserParsable;

return new class extends AdWordsSourceRawParserParsable {
	public $metric = "interactiontypes";
	public $entity = "Location";
	public $platform = "adwords";
	public $report = "GEO_PERFORMANCE_REPORT";
	public $fields = ["InteractionTypes"];
};
