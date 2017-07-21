<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\AdWords\Source\Source_ComplexValueParser_Parsable;

return new class extends Source_ComplexValueParser_Parsable {
	public $id = "searchclickshare";
	public $metric = "searchclickshare";
	public $entity = "Product";
	public $platform = "adwords";
	public $report = "SHOPPING_PERFORMANCE_REPORT";
	public $fields = ["SearchClickShare"];
	public $property = "SearchClickShare";
	public $type = "special";
};
