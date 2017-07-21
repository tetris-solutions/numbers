<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\AdWords\Attribute\Attribute_RawParser;

return new class extends Attribute_RawParser {
	public $id = "systemservingstatus";
	public $property = "SystemServingStatus";
	public $is_filter = true;
	public $type = "systemservingstatus";
	public $is_metric = false;
	public $is_dimension = true;
	public $is_percentage = false;
	public $values = {"ELIGIBLE":"eligible","RARELY_SERVED":"low search volume"};
	public $platform = "adwords";
	public $raw_property = "SystemServingStatus";
};
