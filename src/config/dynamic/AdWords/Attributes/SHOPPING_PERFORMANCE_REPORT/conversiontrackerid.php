<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\AdWords\Attribute\Attribute_IntegerParser;

return new class extends Attribute_IntegerParser {
	public $id = "conversiontrackerid";
	public $property = "ConversionTrackerId";
	public $is_filter = true;
	public $type = "integer";
	public $is_metric = false;
	public $is_dimension = true;
	public $is_percentage = false;
	public $incompatible = ["AverageCpc","Clicks","Cost","Ctr","Impressions","SearchClickShare","SearchImpressionShare"];
	public $platform = "adwords";
	public $raw_property = "ConversionTrackerId";
};
