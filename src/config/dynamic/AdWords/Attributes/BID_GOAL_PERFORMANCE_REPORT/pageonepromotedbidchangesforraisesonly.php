<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\AdWords\Attribute\Attribute_RawParser;

return new class extends Attribute_RawParser {
	public $id = "pageonepromotedbidchangesforraisesonly";
	public $property = "PageOnePromotedBidChangesForRaisesOnly";
	public $is_filter = false;
	public $type = "boolean";
	public $is_metric = false;
	public $is_dimension = true;
	public $is_percentage = false;
	public $platform = "adwords";
	public $raw_property = "PageOnePromotedBidChangesForRaisesOnly";
};
