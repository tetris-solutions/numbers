<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\AdWords\Attribute\Attribute_RawParser;

return new class extends Attribute_RawParser {
	public $id = "slot";
	public $property = "Slot";
	public $is_filter = true;
	public $type = "slot";
	public $is_metric = false;
	public $is_dimension = true;
	public $is_percentage = false;
	public $values = {"SearchRhs":"Google search: Side","SearchTop":"Google search: Top","SearchOther":"Google search: Other","Content":"Google Display Network","AfsTop":"Search partners: Top","AfsOther":"Search partners: Other","Unknown":""};
	public $incompatible = ["AllConversionRate","AllConversionValue","AllConversions","ContentBudgetLostImpressionShare","ContentImpressionShare","ContentRankLostImpressionShare","CostPerAllConversion","CrossDeviceConversions","HourOfDay","InvalidClickRate","InvalidClicks","SearchBudgetLostImpressionShare","SearchExactMatchImpressionShare","SearchImpressionShare","SearchRankLostImpressionShare","ValuePerAllConversion"];
	public $platform = "adwords";
	public $raw_property = "Slot";
};
