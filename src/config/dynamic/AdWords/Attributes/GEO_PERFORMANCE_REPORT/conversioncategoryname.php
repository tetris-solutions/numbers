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
	public $incompatible = ["AverageCost","AverageCpc","AverageCpm","AverageCpv","AveragePosition","Clicks","Cost","Ctr","Impressions","InteractionRate","InteractionTypes","Interactions","VideoViewRate","VideoViews"];
	public $platform = "adwords";
	public $raw_property = "ConversionCategoryName";
};
