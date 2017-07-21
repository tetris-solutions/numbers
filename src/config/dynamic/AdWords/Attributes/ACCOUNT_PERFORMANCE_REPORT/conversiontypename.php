<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\AdWords\Attribute\Attribute_RawParser;

return new class extends Attribute_RawParser {
	public $id = "conversiontypename";
	public $property = "ConversionTypeName";
	public $is_filter = true;
	public $type = "string";
	public $is_metric = false;
	public $is_dimension = true;
	public $is_percentage = false;
	public $incompatible = ["ActiveViewCpm","ActiveViewCtr","ActiveViewImpressions","ActiveViewMeasurability","ActiveViewMeasurableCost","ActiveViewMeasurableImpressions","ActiveViewViewability","AverageCost","AverageCpc","AverageCpe","AverageCpm","AverageCpv","AveragePosition","Clicks","ContentBudgetLostImpressionShare","ContentImpressionShare","ContentRankLostImpressionShare","Cost","Ctr","EngagementRate","Engagements","Impressions","InteractionRate","InteractionTypes","Interactions","InvalidClickRate","InvalidClicks","SearchBudgetLostImpressionShare","SearchExactMatchImpressionShare","SearchImpressionShare","SearchRankLostImpressionShare","VideoViewRate","VideoViews"];
	public $platform = "adwords";
	public $raw_property = "ConversionTypeName";
};
