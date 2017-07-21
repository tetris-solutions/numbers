<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\AdWords\Source\IntegerParser_TrivialSum_Parsable_Summable;

return new class extends IntegerParser_TrivialSum_Parsable_Summable {
	public $id = "viewthroughconversions";
	public $metric = "viewthroughconversions";
	public $entity = "Video";
	public $platform = "adwords";
	public $report = "VIDEO_PERFORMANCE_REPORT";
	public $fields = ["ViewThroughConversions"];
	public $property = "ViewThroughConversions";
	public $type = "integer";
};
