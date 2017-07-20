<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\AdWords\Source\AdWordsSourceComplexValueParserParsable;

return new class extends AdWordsSourceComplexValueParserParsable {
	public $metric = "searchclickshare";
	public $entity = "Partition";
	public $platform = "adwords";
	public $report = "PRODUCT_PARTITION_REPORT";
	public $fields = ["SearchClickShare"];
};
