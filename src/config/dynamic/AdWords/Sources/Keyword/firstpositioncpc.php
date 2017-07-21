<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\AdWords\Source\Source_FloatParser_Parsable;

return new class extends Source_FloatParser_Parsable {
	public $id = "firstpositioncpc";
	public $metric = "firstpositioncpc";
	public $entity = "Keyword";
	public $platform = "adwords";
	public $report = "KEYWORDS_PERFORMANCE_REPORT";
	public $fields = ["FirstPositionCpc"];
	public $property = "FirstPositionCpc";
	public $type = "currency";
};
