<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\AdWords\Attribute\Attribute_RawParser_Parsable;

return new class extends Attribute_RawParser_Parsable {

	public $id = 'conversiontypename';

	public $incompatible = [
	    "AverageCpc",
	    "AverageCpm",
	    "Clicks",
	    "ConversionRate",
	    "Conversions",
	    "Cost",
	    "CostPerConversion",
	    "Ctr",
	    "Impressions",
	    "ValuePerConversion"
	];

	public $is_dimension = true;

	public $is_filter = true;

	public $is_metric = false;

	public $is_percentage = false;

	public $platform = 'adwords';

	public $property = 'ConversionTypeName';

	public $type = 'string';
};
