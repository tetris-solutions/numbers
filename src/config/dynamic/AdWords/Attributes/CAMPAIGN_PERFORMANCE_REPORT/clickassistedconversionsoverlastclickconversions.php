<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\AdWords\Attribute\Attribute_RawParser;

return new class extends Attribute_RawParser {
	public $id = "clickassistedconversionsoverlastclickconversions";
	public $property = "ClickAssistedConversionsOverLastClickConversions";
	public $is_filter = true;
	public $type = "decimal";
	public $is_metric = true;
	public $is_dimension = false;
	public $is_percentage = false;
	public $incompatible = ["ClickType","ConversionCategoryName","ConversionTrackerId","ConversionTypeName","Device","ExternalConversionSource","HourOfDay","Slot"];
	public $platform = "adwords";
	public $raw_property = "ClickAssistedConversionsOverLastClickConversions";
};
