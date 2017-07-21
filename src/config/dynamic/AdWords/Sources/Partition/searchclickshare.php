<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\AdWords\Source\ComplexValueParser_Parsable;

return new class extends ComplexValueParser_Parsable {
	public $id = "searchclickshare";
	public $metric = "searchclickshare";
	public $entity = "Partition";
	public $platform = "adwords";
	public $report = "PRODUCT_PARTITION_REPORT";
	public $fields = ["SearchClickShare"];
	public $property = "SearchClickShare";
	public $type = "special";
};
