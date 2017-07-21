<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\AdWords\Attribute\Attribute_JSONParser;

return new class extends Attribute_JSONParser {
	public $id = "creativefinalmobileurls";
	public $property = "CreativeFinalMobileUrls";
	public $is_filter = true;
	public $type = "list";
	public $is_metric = false;
	public $is_dimension = true;
	public $is_percentage = false;
	public $platform = "adwords";
	public $raw_property = "CreativeFinalMobileUrls";
};
