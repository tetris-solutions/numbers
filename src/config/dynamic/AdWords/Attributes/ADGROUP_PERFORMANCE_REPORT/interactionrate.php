<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\AdWords\Attribute\Attribute_RawParser;

return new class extends Attribute_RawParser {
	public $id = "interactionrate";
	public $property = "InteractionRate";
	public $is_filter = true;
	public $type = "percentage";
	public $is_metric = true;
	public $is_dimension = false;
	public $is_percentage = true;
	public $incompatible = ["ConversionCategoryName","ConversionTrackerId","ConversionTypeName","ExternalConversionSource"];
	public $platform = "adwords";
	public $raw_property = "InteractionRate";
};
