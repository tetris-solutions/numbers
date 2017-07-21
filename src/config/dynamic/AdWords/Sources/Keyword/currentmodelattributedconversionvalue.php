<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\AdWords\Source\FloatParser_TrivialSum_Parsable_Summable;

return new class extends FloatParser_TrivialSum_Parsable_Summable {
	public $id = "currentmodelattributedconversionvalue";
	public $metric = "currentmodelattributedconversionvalue";
	public $entity = "Keyword";
	public $platform = "adwords";
	public $report = "KEYWORDS_PERFORMANCE_REPORT";
	public $fields = ["CurrentModelAttributedConversionValue"];
	public $property = "CurrentModelAttributedConversionValue";
	public $type = "decimal";
};
