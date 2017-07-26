<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\Shared\Attribute\Attribute_RawParser_Parsable;

return new class extends Attribute_RawParser_Parsable {

	public $id = 'slot';

	public $incompatible = [
	    "allconversionrate",
	    "allconversionvalue",
	    "allconversions",
	    "costperallconversion",
	    "crossdeviceconversions",
	    "valueperallconversion"
	];

	public $is_dimension = true;

	public $is_filter = true;

	public $is_metric = false;

	public $is_percentage = false;

	public $platform = 'adwords';

	public $property = 'Slot';

	public $type = 'slot';

	public $values = [
	    "SearchRhs" => "Google search: Side",
	    "SearchTop" => "Google search: Top",
	    "SearchOther" => "Google search: Other",
	    "Content" => "Google Display Network",
	    "AfsTop" => "Search partners: Top",
	    "AfsOther" => "Search partners: Other",
	    "Unknown" => ""
	];
};
