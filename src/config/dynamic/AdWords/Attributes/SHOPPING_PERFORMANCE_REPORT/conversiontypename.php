<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\AdWords\Attribute\Attribute_RawParser;

return new class extends Attribute_RawParser {
	public $id = "conversiontypename";
	public $property = "ConversionTypeName";
	public $is_filter = true;
	public $type = "string";
	public $is_metric = false;
	public $is_dimension = true;
	public $is_percentage = false;
	public $incompatible = ["AverageCpc","Clicks","Cost","Ctr","Impressions","SearchClickShare","SearchImpressionShare"];
	public $platform = "adwords";
	public $raw_property = "ConversionTypeName";
};
