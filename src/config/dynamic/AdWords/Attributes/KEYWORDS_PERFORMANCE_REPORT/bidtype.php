<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\AdWords\Attribute\Attribute_RawParser;

return new class extends Attribute_RawParser {
	public $id = "bidtype";
	public $property = "BidType";
	public $is_filter = true;
	public $type = "bidtype";
	public $is_metric = false;
	public $is_dimension = true;
	public $is_percentage = false;
	public $values = {"TARGET_CPA":"target cpa"};
	public $platform = "adwords";
	public $raw_property = "BidType";
};
