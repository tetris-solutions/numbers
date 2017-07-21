<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\AdWords\Attribute\Attribute_RawParser;

return new class extends Attribute_RawParser {
	public $id = "searchranklostimpressionshare";
	public $property = "SearchRankLostImpressionShare";
	public $is_filter = true;
	public $type = "special";
	public $is_metric = true;
	public $is_dimension = false;
	public $is_percentage = true;
	public $incompatible = ["ClickType","ConversionCategoryName","ConversionTrackerId","ConversionTypeName","ExternalConversionSource","Slot"];
	public $platform = "adwords";
	public $raw_property = "SearchRankLostImpressionShare";
};
