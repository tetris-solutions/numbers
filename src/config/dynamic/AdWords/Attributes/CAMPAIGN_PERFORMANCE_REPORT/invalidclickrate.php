<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\AdWords\Attribute\Attribute_RawParser_Parsable;

return new class extends Attribute_RawParser_Parsable {

	public $id = 'invalidclickrate';

	public $incompatible = [
	    "conversioncategoryname",
	    "conversiontrackerid",
	    "conversiontypename",
	    "externalconversionsource",
	    "hourofday",
	    "slot"
	];

	public $is_dimension = false;

	public $is_filter = true;

	public $is_metric = true;

	public $is_percentage = true;

	public $platform = 'adwords';

	public $property = 'InvalidClickRate';

	public $type = 'percentage';
};
