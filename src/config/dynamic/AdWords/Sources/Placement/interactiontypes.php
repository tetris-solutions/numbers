<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\AdWords\Source\Source_RawParser_Parsable;

return new class extends Source_RawParser_Parsable {
	public $id = "interactiontypes";
	public $metric = "interactiontypes";
	public $entity = "Placement";
	public $platform = "adwords";
	public $report = "AUTOMATIC_PLACEMENTS_PERFORMANCE_REPORT";
	public $fields = ["InteractionTypes"];
	public $property = "InteractionTypes";
	public $type = "raw";
};
