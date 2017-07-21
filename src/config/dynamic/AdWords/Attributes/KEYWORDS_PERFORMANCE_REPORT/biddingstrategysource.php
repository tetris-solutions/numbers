<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\AdWords\Attribute\Attribute_RawParser;

return new class extends Attribute_RawParser {
	public $id = "biddingstrategysource";
	public $property = "BiddingStrategySource";
	public $is_filter = true;
	public $type = "biddingstrategysource";
	public $is_metric = false;
	public $is_dimension = true;
	public $is_percentage = false;
	public $values = {"CAMPAIGN":"campaign","ADGROUP":"ad group","CRITERION":"ad group criterion"};
	public $platform = "adwords";
	public $raw_property = "BiddingStrategySource";
};
