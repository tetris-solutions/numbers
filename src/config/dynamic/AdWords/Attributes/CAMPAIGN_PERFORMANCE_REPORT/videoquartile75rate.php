<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\AdWords\Attribute\Attribute_RawParser_Parsable;

return new class extends Attribute_RawParser_Parsable {

	public $id = 'videoquartile75rate';

	public $incompatible = [
	    "clicktype",
	    "conversioncategoryname",
	    "conversiontrackerid",
	    "conversiontypename",
	    "externalconversionsource"
	];

	public $is_dimension = false;

	public $is_filter = true;

	public $is_metric = true;

	public $is_percentage = true;

	public $platform = 'adwords';

	public $property = 'VideoQuartile75Rate';

	public $type = 'percentage';
};
