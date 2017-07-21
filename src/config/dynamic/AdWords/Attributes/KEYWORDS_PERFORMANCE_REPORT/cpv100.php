<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\AdWords\Attribute\Attribute_RawParser_Parsable;

return new class extends Attribute_RawParser_Parsable {

	public $id = 'cpv100';

	public $incompatible = [
	    "conversioncategoryname",
	    "conversiontrackerid",
	    "conversiontypename",
	    "externalconversionsource"
	];

	public $is_dimension = false;

	public $is_filter = false;

	public $is_metric = true;

	public $is_percentage = false;

	public $platform = 'adwords';

	public $property = 'Cpv100';

	public $type = 'currency';
};
