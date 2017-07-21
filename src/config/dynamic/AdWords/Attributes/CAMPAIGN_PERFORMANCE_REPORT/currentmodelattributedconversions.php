<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\AdWords\Attribute\Attribute_RawParser;

return new class extends Attribute_RawParser {
	public $id = "currentmodelattributedconversions";
	public $property = "CurrentModelAttributedConversions";
	public $is_filter = true;
	public $type = "decimal";
	public $is_metric = true;
	public $is_dimension = false;
	public $is_percentage = false;
	public $platform = "adwords";
	public $raw_property = "CurrentModelAttributedConversions";
};
