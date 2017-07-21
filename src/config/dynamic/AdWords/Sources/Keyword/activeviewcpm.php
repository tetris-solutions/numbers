<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\AdWords\Source\FloatParser_Parsable;

return new class extends FloatParser_Parsable {
	public $id = "activeviewcpm";
	public $metric = "activeviewcpm";
	public $entity = "Keyword";
	public $platform = "adwords";
	public $report = "KEYWORDS_PERFORMANCE_REPORT";
	public $fields = ["ActiveViewCpm"];
	public $property = "ActiveViewCpm";
	public $type = "currency";
};
