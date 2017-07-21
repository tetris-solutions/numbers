<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\AdWords\Attribute\Attribute_RawParser;

return new class extends Attribute_RawParser {
	public $id = "impressionassistedconversions";
	public $property = "ImpressionAssistedConversions";
	public $is_filter = true;
	public $type = "integer";
	public $is_metric = true;
	public $is_dimension = false;
	public $is_percentage = false;
	public $incompatible = ["ClickType","ConversionCategoryName","ConversionTrackerId","ConversionTypeName","Device","ExternalConversionSource","Slot"];
	public $platform = "adwords";
	public $raw_property = "ImpressionAssistedConversions";
};
