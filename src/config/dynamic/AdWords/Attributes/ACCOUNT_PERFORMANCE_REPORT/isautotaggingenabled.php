<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\AdWords\Attribute\Attribute_RawParser;

return new class extends Attribute_RawParser {
	public $id = "isautotaggingenabled";
	public $property = "IsAutoTaggingEnabled";
	public $is_filter = true;
	public $type = "enum";
	public $is_metric = false;
	public $is_dimension = true;
	public $is_percentage = false;
	public $values = {"TRUE":"true","FALSE":"false"};
	public $platform = "adwords";
	public $raw_property = "IsAutoTaggingEnabled";
};
