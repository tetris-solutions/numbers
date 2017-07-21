<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\AdWords\Attribute\Attribute_RawParser;

return new class extends Attribute_RawParser {
	public $id = "conversioncategoryname";
	public $property = "ConversionCategoryName";
	public $is_filter = true;
	public $type = "string";
	public $is_metric = false;
	public $is_dimension = true;
	public $is_percentage = false;
	public $incompatible = ["AverageCpc","AverageCpm","Clicks","ConversionRate","Conversions","Cost","CostPerConversion","Ctr","Impressions","ValuePerConversion"];
	public $platform = "adwords";
	public $raw_property = "ConversionCategoryName";
};
