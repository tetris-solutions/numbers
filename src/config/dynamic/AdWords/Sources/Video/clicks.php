<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\AdWords\Source\Source_IntegerParser_TrivialSum_Parsable_Summable;

return new class extends Source_IntegerParser_TrivialSum_Parsable_Summable {
	public $id = "clicks";
	public $metric = "clicks";
	public $entity = "Video";
	public $platform = "adwords";
	public $report = "VIDEO_PERFORMANCE_REPORT";
	public $fields = ["Clicks"];
	public $property = "Clicks";
	public $type = "integer";
};
