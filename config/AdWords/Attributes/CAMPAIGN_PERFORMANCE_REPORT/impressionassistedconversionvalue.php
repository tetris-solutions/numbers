<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\Shared\Attribute\Attribute_RawParser_Parsable;

return new class extends Attribute_RawParser_Parsable {

	public $id = 'impressionassistedconversionvalue';

	public $incompatible = [
	    "clicktype",
	    "conversioncategoryname",
	    "conversiontrackerid",
	    "conversiontypename",
	    "device",
	    "externalconversionsource",
	    "hourofday",
	    "slot"
	];

	public $is_dimension = false;

	public $is_filter = true;

	public $is_metric = true;

	public $is_percentage = false;

	public $platform = 'adwords';

	public $property = 'ImpressionAssistedConversionValue';

	public $type = 'decimal';
};
