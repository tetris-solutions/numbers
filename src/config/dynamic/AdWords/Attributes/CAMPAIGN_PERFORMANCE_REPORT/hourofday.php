<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\AdWords\Attribute\Attribute_IntegerParser_Parsable;

return new class extends Attribute_IntegerParser_Parsable {

	public $id = 'hourofday';

	public $incompatible = [
	    "allconversionrate",
	    "allconversionvalue",
	    "allconversions",
	    "averagefrequency",
	    "averagepageviews",
	    "averagetimeonsite",
	    "bouncerate",
	    "clickassistedconversionvalue",
	    "clickassistedconversions",
	    "clickassistedconversionsoverlastclickconversions",
	    "costperallconversion",
	    "crossdeviceconversions",
	    "impressionassistedconversionvalue",
	    "impressionassistedconversions",
	    "impressionassistedconversionsoverlastclickconversions",
	    "impressionreach",
	    "invalidclickrate",
	    "invalidclicks",
	    "percentnewvisitors",
	    "relativectr",
	    "slot",
	    "valueperallconversion"
	];

	public $is_dimension = true;

	public $is_filter = true;

	public $is_metric = false;

	public $is_percentage = false;

	public $platform = 'adwords';

	public $property = 'HourOfDay';

	public $type = 'integer';
};
