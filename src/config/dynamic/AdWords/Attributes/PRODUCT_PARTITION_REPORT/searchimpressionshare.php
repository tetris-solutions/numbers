<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\AdWords\Attribute\Attribute_RawParser;

return new class extends Attribute_RawParser {
	public $id = "searchimpressionshare";
	public $property = "SearchImpressionShare";
	public $is_filter = true;
	public $type = "special";
	public $is_metric = true;
	public $is_dimension = false;
	public $is_percentage = true;
	public $incompatible = ["ClickType"];
	public $platform = "adwords";
	public $raw_property = "SearchImpressionShare";
};
