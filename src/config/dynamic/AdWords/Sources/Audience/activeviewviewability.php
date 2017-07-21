<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\AdWords\Source\Source_FloatParser_TrivialSum_Parsable_Summable;

return new class extends Source_FloatParser_TrivialSum_Parsable_Summable {
	public $id = "activeviewviewability";
	public $metric = "activeviewviewability";
	public $entity = "Audience";
	public $platform = "adwords";
	public $report = "AUDIENCE_PERFORMANCE_REPORT";
	public $fields = ["ActiveViewViewability"];
	public $property = "ActiveViewViewability";
	public $type = "decimal";
};
