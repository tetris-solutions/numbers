<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\AdWords\Source\FloatParser_TrivialSum_Parsable_Summable;

return new class extends FloatParser_TrivialSum_Parsable_Summable {
	public $id = "allconversionvalue";
	public $metric = "allconversionvalue";
	public $entity = "Partition";
	public $platform = "adwords";
	public $report = "PRODUCT_PARTITION_REPORT";
	public $fields = ["AllConversionValue"];
	public $property = "AllConversionValue";
	public $type = "decimal";
};
