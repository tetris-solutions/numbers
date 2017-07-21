<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\AdWords\Attribute\Attribute_RawParser;

return new class extends Attribute_RawParser {

	public $id = 'slot';

	public $incompatible = [
	    "AllConversionRate",
	    "AllConversionValue",
	    "AllConversions",
	    "ContentBudgetLostImpressionShare",
	    "ContentImpressionShare",
	    "ContentRankLostImpressionShare",
	    "CostPerAllConversion",
	    "CrossDeviceConversions",
	    "HourOfDay",
	    "InvalidClickRate",
	    "InvalidClicks",
	    "SearchBudgetLostImpressionShare",
	    "SearchExactMatchImpressionShare",
	    "SearchImpressionShare",
	    "SearchRankLostImpressionShare",
	    "ValuePerAllConversion"
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
