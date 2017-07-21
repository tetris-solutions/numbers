<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\AdWords\Attribute\Attribute_RawParser;

return new class extends Attribute_RawParser {
	public $id = "gmailsaves";
	public $property = "GmailSaves";
	public $is_filter = true;
	public $type = "integer";
	public $is_metric = true;
	public $is_dimension = false;
	public $is_percentage = false;
	public $incompatible = ["ConversionCategoryName","ConversionTrackerId","ConversionTypeName","ExternalConversionSource"];
	public $platform = "adwords";
	public $raw_property = "GmailSaves";
};
