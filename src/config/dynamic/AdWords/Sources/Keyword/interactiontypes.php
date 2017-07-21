<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\AdWords\Source\Source_RawParser_Parsable;

return new class extends Source_RawParser_Parsable {
	public $id = "interactiontypes";
	public $metric = "interactiontypes";
	public $entity = "Keyword";
	public $platform = "adwords";
	public $report = "KEYWORDS_PERFORMANCE_REPORT";
	public $fields = ["InteractionTypes"];
	public $property = "InteractionTypes";
	public $type = "raw";
};
