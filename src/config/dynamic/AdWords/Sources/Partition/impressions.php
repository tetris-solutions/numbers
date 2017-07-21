<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\AdWords\Source\Source_IntegerParser_TrivialSum_Parsable_Summable;

return new class extends Source_IntegerParser_TrivialSum_Parsable_Summable {
	public $id = "impressions";
	public $metric = "impressions";
	public $entity = "Partition";
	public $platform = "adwords";
	public $report = "PRODUCT_PARTITION_REPORT";
	public $fields = ["Impressions"];
	public $property = "Impressions";
	public $type = "integer";
};
