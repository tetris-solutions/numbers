<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\AdWords\Attribute\Attribute_RawParser;

return new class extends Attribute_RawParser {

	public $id = 'systemservingstatus';

	public $is_dimension = true;

	public $is_filter = true;

	public $is_metric = false;

	public $is_percentage = false;

	public $platform = 'adwords';

	public $property = 'SystemServingStatus';

	public $type = 'systemservingstatus';

	public $values = [
	    "ELIGIBLE" => "eligible",
	    "RARELY_SERVED" => "low search volume"
	];
};
