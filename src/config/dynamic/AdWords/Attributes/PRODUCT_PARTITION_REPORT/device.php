<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\AdWords\Attribute\Attribute_RawParser_Parsable;

return new class extends Attribute_RawParser_Parsable {

	public $id = 'device';

	public $incompatible = [
	    "benchmarkaveragemaxcpc",
	    "benchmarkctr"
	];

	public $is_dimension = true;

	public $is_filter = true;

	public $is_metric = false;

	public $is_percentage = false;

	public $platform = 'adwords';

	public $property = 'Device';

	public $type = 'devicetype';

	public $values = [
	    "UNKNOWN" => "Other",
	    "DESKTOP" => "Computers",
	    "HIGH_END_MOBILE" => "Mobile devices with full browsers",
	    "TABLET" => "Tablets with full browsers"
	];
};
