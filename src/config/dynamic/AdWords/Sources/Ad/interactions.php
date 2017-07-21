<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\AdWords\Source\IntegerParser_TrivialSum_Parsable_Summable;

return new class extends IntegerParser_TrivialSum_Parsable_Summable {
	public $id = "interactions";
	public $metric = "interactions";
	public $entity = "Ad";
	public $platform = "adwords";
	public $report = "AD_PERFORMANCE_REPORT";
	public $fields = ["Interactions"];
	public $property = "Interactions";
	public $type = "integer";
};
